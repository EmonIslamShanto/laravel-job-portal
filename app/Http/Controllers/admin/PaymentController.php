<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class PaymentController extends Controller
{

    function paymentSuccess(): View
    {
        return view('front-end.pages.payment-success');
    }

    function paymentError(): View
    {
        return view('front-end.pages.payment-error');
    }

    // Payment With Paypal


    function setPapalConfig(): array
    {

        return [
            'mode'    => config('gatewaySettings.paypal_account_mode'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id'         => config('gatewaySettings.paypal_client_id'),
                'client_secret'     => config('gatewaySettings.paypal_client_secrete'),
                'app_id'            => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id'         => config('gatewaySettings.paypal_client_id'),
                'client_secret'     => config('gatewaySettings.paypal_client_secrete'),
                'app_id'            => config('gatewaySettings.paypal_app_id'),
            ],

            'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
            'currency'       => config('gatewaySettings.paypal_currency_name'),
            'notify_url'     => '', // Change this accordingly for your application.
            'locale'         => 'en_US', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
        ];
    }

    function payWithPaypal()
    {
        abort_if(!$this->checkSession(), 404, 'Session Id Not Found');
        
        $config = $this->setPapalConfig();

        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $payableAmount = round(Session::get('selected_plan')['price'] * config('gatewaySettings.paypal_currency_rate'));

        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('company.paypal.success'),
                'cancel_url' => route('company.paypal.cancel')
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'value' => $payableAmount,
                        'currency_code' => config('gatewaySettings.paypal_currency_name')
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] !== NULL) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }
    }

    function paypalSuccess(Request $request)
    {
        abort_if(!$this->checkSession(), 404, 'Session Id Not Found');

        $config = $this->setPapalConfig();

        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {

            $capture = $response['purchase_units'][0]['payments']['captures'][0];

            try {
                OrderService::storeOrder($capture['id'], 'paypal', $capture['amount']['value'], $capture['amount']['currency_code'], 'paid');

                OrderService::setUserPlan();
                Session::forget('selected_plan');

                return redirect()->route('company.payment.success');
            } catch (\Exception $e) {
                logger('Payment Error >> ' . $e);
            }
        }

        $response = $provider->capturePaymentOrder($request->token);
        return redirect()->route('company.payment.error')->withErrors(['error' => $response['error']['message']]);
    }

    function paypalCancel()
    {
        return redirect()->route('company.payment.error')->withErrors(['error' => 'Something went wrong. Please try again.']);
    }


    // Payment With Stripe
    function payWithStripe()
    {
        abort_if(!$this->checkSession(), 404, 'Session Id Not Found');

        Stripe::setApiKey(config('gatewaySettings.stripe_secret_key'));

        $payableAmount = round(Session::get('selected_plan')['price'] * config('gatewaySettings.stripe_currency_rate')) * 100;

        $response = StripeSession::create([

            'line_items' => [
                [
                    'price_data' => [
                        'currency' => config('gatewaySettings.stripe_currency_name'),
                        'product_data' => [
                            'name' => Session::get('selected_plan')['label'] . 'package',
                        ],
                        'unit_amount' => $payableAmount,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('company.stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('company.stripe.cancel'),
        ]);

        return redirect()->away($response->url);
    }


    function stripeSuccess(Request $request)
    {
        abort_if(!$this->checkSession(), 404, 'Session Id Not Found');

        Stripe::setApiKey(config('gatewaySettings.stripe_secret_key'));

        $sessionId = $request->session_id;
        $response = StripeSession::retrieve($sessionId);

        if($response->payment_status === 'paid') {
            try {
                OrderService::storeOrder($response->payment_intent, 'stripe', ($response->amount_total / 100), $response->currency, 'paid');

                OrderService::setUserPlan();
                Session::forget('selected_plan');

                return redirect()->route('company.payment.success');
            } catch (\Exception $e) {
                logger('Payment Error >> ' . $e);
            }
        }else{
            return redirect()->route('company.payment.error')->withErrors(['error' => 'Something went wrong. Please try again.']);
        }
    }

    function stripeCancel()
    {
        return redirect()->route('company.payment.error')->withErrors(['error' => 'Something went wrong. Please try again.']);
    }


    //Check Session For Selected Plan
    function checkSession(): bool{
        if(session()->has('selected_plan')){
            return true;
        }
        return false;
    }
}
