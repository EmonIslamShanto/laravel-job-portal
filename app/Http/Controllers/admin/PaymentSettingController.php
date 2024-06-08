<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaypalSettingsUpdateRequest;
use App\Http\Requests\Admin\StripeSettingUpdateRequest;
use App\Models\Country;
use App\Models\PaymentSetting;
use App\Services\Notify;
use App\Services\PaymentGatewaySettingService;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentSettingController extends Controller
{
    function index(): View{

        return view('admin.payment-settings.index');
    }

    function updatePaypalSetting(PaypalSettingsUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        foreach($validated as $key => $value){
            PaymentSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingService = app(PaymentGatewaySettingService::class);
        $settingService->clearCacheSettings();

        Notify::updatedNotification();
        return redirect()->back();
    }

    function updateStripeSetting(StripeSettingUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        foreach($validated as $key => $value){
            PaymentSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingService = app(PaymentGatewaySettingService::class);
        $settingService->clearCacheSettings();

        Notify::updatedNotification();
        return redirect()->back();
    }
}
