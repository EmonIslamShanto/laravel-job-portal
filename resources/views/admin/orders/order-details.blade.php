@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Order Details</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Order Details</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <div class="t-body">
                                    <tr>
                                        <th scope="row">Order Id</th>
                                        <td>{{ $order->order_id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Transaction Id</th>
                                        <td>{{ $order->transaction_id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Date</th>
                                        <td>{{ formatDate($order->created_at) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Action</th>
                                        <td><b><a href="{{ route('admin.orders.invoice', $order->id) }}">Download Invoice</a></b></td>
                                    </tr>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Comapny Details</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <div class="t-body">
                                    <tr>
                                        <th scope="row">Company Logo</th>
                                        <td><img src="{{ $order?->company->logo }}" style="width: 50px; height:50px" alt=""></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Company Name</th>
                                        <td>{{ $order?->company?->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Company Email</th>
                                        <td>{{ $order?->company?->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Company Phone</th>
                                        <td>{{ $order?->company?->phone }}</td>
                                    </tr>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Payment Details</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <div class="t-body">
                                    <tr>
                                        <th scope="row">Payment Provider</th>
                                        <td>{{ $order?->payment_provider }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Plan Name</th>
                                        <td>{{ $order?->package_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Paid Amount</th>
                                        <td>{{ $order?->amount }} {{ $order?->paid_in_currency }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Default Amount</th>
                                        <td>{{ $order?->default_amount }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Payment Status</th>
                                        <td><p class="badge bg-primary mt-3 text-light">{{ $order?->payment_status }}</p></td>
                                    </tr>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
