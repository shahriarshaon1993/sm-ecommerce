@extends('frontend.layouts.master')

@section('main')

    @include('frontend.partials._hero')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-3">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="{{ route('product.details', $product->slug) }}">
                                <img src="{{ $product->getFirstMediaUrl('products') }}" width="100%" height="225">
                            </a>
                            <div class="card-body">
                                <p class="card-text">
                                    <a href="{{ route('product.details', $product->slug) }}">
                                        {{ $product->title }}
                                    </a>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">

                                        <form action="{{ route('cart.add') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">Add to cart</button>
                                        </form>

                                    </div>
                                    <strong class="text-muted">

                                        @if ($product->sale_price != null && $product->sale_price > 0)
                                            BDT<strike> {{ $product->price }}</strike> BDT {{ $product->sale_price }}
                                        @else
                                            BDT {{ $product->price }}
                                        @endif

                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $products->links() }}
        </div>
    </div>

@endsection
