@extends('front-end.layouts.master')

@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Orders</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Order</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('front-end.company-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 mb-3">
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
                                                    <td><b><a class="btn btn-success" href="{{ route('company.orders.invoice', $order->id) }}">Download
                                                                Invoice</a></b></td>
                                                </tr>
                                            </div>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
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
                                                    <td>
                                                        <p class="badge bg-success mt-3 text-light">
                                                            {{ $order?->payment_status }}</p>
                                                    </td>
                                                </tr>
                                            </div>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
