@extends('frontend.layouts.master')

@section('main')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Register
                </div>
                <div class="card-body">
                    <div class="form-design">

                        @include('frontend.partials._message')

                        <form action="{{ route('register') }}" method="POST" class="form">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Full name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your full name" value="{{ old('name') }}">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="example@xxx.com" value="{{ old('email') }}">
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone number</label>
                                <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="+88 0000 000 000" value="{{ old('phone_number') }}">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Your password">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-info">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
