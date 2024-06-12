<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\View\View;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;

class OrderController extends Controller
{
    use Searchable;
    public function index(): View
    {
        $query = Order::query();
        $query->with('company', 'plan');
        $this->search($query, ['package_name', 'order_id', 'payment_status', 'payment_provider', 'paid_in_currency', 'transaction_id']);
        $orders = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(String $id): View
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.order-details', compact('order'));
    }

    function invoice(String $id)
    {

        $order = Order::findOrFail($id);

        $customer = new Buyer([
            'name'          => $order?->company?->name,
            'custom_fields' => [
                'email' => $order?->company?->email,
                'transaction' => $order->transaction_id,
                'payment method' => $order->payment_provider,
            ],
        ]);

        $seller = new Party([
            'name'          => config('settings.site_name'),
            'phone'         => config('settings.site_phone'),
            'custom_fields' => [
                'email'        => config('settings.site_email'),
            ],
        ]);

        $item = InvoiceItem::make($order->package_name . ' Plan')->pricePerUnit($order->amount);

        $invoice = Invoice::make()
            ->series($order->order_id)
            ->buyer($customer)
            ->seller($seller)
            ->status($order->payment_status)
            ->currencyCode($order->paid_in_currency)
            ->currencySymbol($order->paid_in_currency)
            ->addItem($item);

        return $invoice->download();
    }
}
