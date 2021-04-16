@extends('frontend.layouts.master')

@section('main')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="card">
                <div class="card-header text-center">
                    Cart
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (empty($cart))
                        <div class="alert alert-info" role="alert">
                            Please add some product to your cart.
                        </div>
                    @else
                        <table class="table table-bordered table-light">
                            <thead>
                                <tr>
                                    <th scope="col-5">Serial</th>
                                    <th scope="col-5">Product</th>
                                    <th scope="col-2">Unit Price</th>
                                    <th scope="col-2">Quantity</th>
                                    <th scope="col-5">Price</th>
                                    <th scope="col-5">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($cart as $key => $product)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $product['title'] }}</td>
                                        <td>{{ $product['unit_price'] }}</td>
                                        <td><input type="number" name="quantity" class="form-control" value="{{ $product['quantity'] }}"></td>
                                        <td>BDT {{ $product['total_price'] }} /=</td>
                                        <td>
                                            <form action="{{ route('cart.remove') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $key }}">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                    <tr>
                                        <th></th>
                                        <td></td>
                                        <td></td>
                                        <td style="float: right;">Total =</td>
                                        <td>BDT {{ number_format($total, 2) }} /=</td>
                                        <td></td>
                                    </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('cart.clear') }}" class="btn btn-sm btn-danger">Clear all</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
