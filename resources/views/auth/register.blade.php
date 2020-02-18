@extends('layouts.login')
@section('title', 'Register')
@section('content')
<body class="page-login" init-ripples="">
    <div class="center">
        <div class="card bordered z-depth-2" style="margin:0% auto; max-width:400px;">
            <div class="card-header">
                <div class="brand-logo">
                    <div id="logo">
                        <div class="foot1"></div>
                        <div class="foot2"></div>
                        <div class="foot3"></div>
                        <div class="foot4"></div>
                    </div> @yield('title')
                </div>
            </div>
            <div class="card-content">
                <div class="m-b-30">
                    <div class="card-title strong pink-text">@yield('title')</div>
                    <p class="card-title-desc"> Welcome to @yield('title')!</p>
                </div>
                <form class="form-floating" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="inputNama" class="control-label">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required >

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required >

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputAddress" class="control-label">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}" required >

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputPhone" class="control-label">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required >

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="inputPassword" class="control-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="control-label">Password</label>
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="card-action clearfix">
                    <div class="pull-right">
                        {{-- <button type="button" class="btn btn-link black-text">Login</button> --}}
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

