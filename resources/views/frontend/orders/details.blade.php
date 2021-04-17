@extends('frontend.layouts.master')

@section('main')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Order Details
                </div>

                <div class="card-body">

                    @include('frontend.partials._message')

                    <div class="row">
                        <div class="col-md-6">
                            <h3>Order Id: {{ $order->id }}</h3><hr>
                            <ul class="list-group">
                                @foreach ($order->toArray() as $column => $value)
                                    @if (is_string($value))
                                        @if ($column == 'user_id' || $column == 'id')
                                            @continue
                                        @endif
                                        <li class="list-group-item">
                                            <b>{{ ucwords(str_replace('_', ' ', $column)) }}: </b> {{ $value }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3>Order Products</h3><hr>
                            <table class="table table-bordered table-light">
                                <thead>
                                    <tr>
                                        <th scope="col-5">Title</th>
                                        <th scope="col-5">Qty</th>
                                        <th scope="col-2">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->products as $product)
                                        <tr>
                                            <td>{{ $product->product->title }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ number_format($product->price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
