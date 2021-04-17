@extends('frontend.layouts.master')

@section('main')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <div class="form-design">

                        @include('frontend.partials._message')

                        <form action="{{ route('login') }}" method="POST" class="form">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="example@xxx.com" value="{{ old('email') }}">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Your password">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-info">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
