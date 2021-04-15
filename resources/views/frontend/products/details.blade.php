@extends('frontend.layouts.master')

@section('main')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 mt-4">
                            <img src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->title }}" width="280" height="200">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <strong class="text-muted">BDT {{ $product->price }}</strong>
                                <hr>
                                <p>Description: </p>
                                <p class="card-text">{{ $product->description }}</p>
                                <hr>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-secondary">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
