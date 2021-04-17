@extends('frontend.layouts.master')

@section('main')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Checkout
                </div>
                <div class="card-body">
                    @guest
                        <div class="alert alert-info">
                            You need to <a href="{{ route('login') }}">Login</a> first to complete your order.
                        </div>
                    @else
                        <div class="alert alert-info">
                            You are ordering as, {{ auth()->user()->name }}
                        </div>
                    @endguest

                    @include('frontend.partials._message')

                    @auth
                        <div class="row">
                            <div class="col-md-4 order-md-2 mb-4">
                                <h4 class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted">Your cart</span>
                                    <span class="badge badge-secondary badge-pill text-muted">{{ count($cart) }}</span>
                                </h4>
                                <ul class="list-group mb-3">
                                    @foreach ($cart as $key => $product)
                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div>
                                                <h6 class="my-0">{{ $product['title'] }}</h6>
                                                <small class="text-muted">Quantity: {{ $product['quantity'] }}</small>
                                            </div>
                                            <span class="text-muted">{{ number_format($product['total_price'], 2) }}</span>
                                        </li>
                                    @endforeach
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Total (BDT)</span>
                                        <strong>BDT {{ number_format($total, 2) }}</strong>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8 order-md-1">
                                <h4 class="mb-3">Billing address</h4>
                                <form class="needs-validation" action="{{ route('order') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="customer_name">Customer Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{ auth()->user()->name }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="customer_phone_number">Customer Phone No.</label>
                                        <input type="text" class="form-control" id="customer_phone_number" name="customer_phone_number" value="{{ auth()->user()->phone_number  }}">
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="city">City</label>
                                            <input class="form-control" type="text" name="city" id="city" placeholder="Your City" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="postal_code">Postal Code</label>
                                            <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postal Code" required="">
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <button class="btn btn-primary btn-block" type="submit">Checkout</button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

@endsection
