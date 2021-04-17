@extends('frontend.layouts.master')

@section('main')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    My Orders
                </div>
                <div class="card-body">

                    @include('frontend.partials._message')

                    <table class="table table-bordered table-light">
                        <thead>
                            <tr>
                                <th scope="col-5">Order Id</th>
                                <th scope="col-5">Customer Name</th>
                                <th scope="col-5">Phone Number</th>
                                <th scope="col-5">Total Amount</th>
                                <th scope="col-5">Paid Amount</th>
                                <th scope="col-5">Action</th>
                            </tr>
                        </thead>
                        <thead>
                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
                                    <th>{{ $order->customer_name }}</th>
                                    <th>{{ $order->customer_phone_number }}</th>
                                    <th>{{ $order->total_amount }}</th>
                                    <th>{{ $order->paid_amount }}</th>
                                    <th>
                                        <a href="{{ route('order.details', $order->id) }}" class="btn btn-sm btn-info">Details</a>
                                    </th>
                                </tr>
                            @endforeach
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
