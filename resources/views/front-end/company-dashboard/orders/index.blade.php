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
                    <div class="card">
                        <div class="card-header">
                            <h4>All Orders</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Transaction Id</th>
                                        <th>Payment Provider</th>
                                        <th>Plan Name</th>
                                        <th>Amount</th>
                                        <th>Payment Status</th>
                                        <th>View</th>
                                    </tr>
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ $order->transaction_id }}</td>
                                            <td>{{ $order?->payment_provider }}</td>
                                            <td>{{ $order?->package_name }}</td>
                                            <td>{{ $order?->amount }} {{ $order?->paid_in_currency }}</td>
                                            <td>
                                                <p class="badge bg-primary mt-3 text-light">
                                                    {{ $order?->payment_status }}</p>
                                            </td>
                                            <td>
                                                <a href="{{ route('company.orders.show', $order->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No order found</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                @if ($orders->hasPages())
                                    {{ $orders->withQueryString()->links() }}
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
