@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Order List</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Orders</h4>
                            <div class="card-header-form">
                                <form action="{{ route('admin.orders.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                                        <div class="input-group-btn">
                                            <button type="submit" style="height: 40px" class="btn btn-primary"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Transaction Id</th>
                                        <th>Company Logo</th>
                                        <th>Company Name</th>
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
                                            <td><img src="{{ $order?->company->logo }}" style="width: 50px; height:50px" alt=""></td>
                                            <td>{{ $order?->company?->name }}</td>
                                            <td>{{ $order?->payment_provider }}</td>
                                            <td>{{ $order?->package_name }}</td>
                                            <td>{{ $order?->amount }} {{ $order?->paid_in_currency }}</td>
                                            <td><p class="badge bg-primary mt-3 text-light">{{ $order?->payment_status }}</p></td>
                                            <td>
                                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
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
