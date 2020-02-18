@extends('layouts.login')
@section('title','Login Page')
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
                    <div class="card-title strong pink-text">Login</div>
                    <p class="card-title-desc"> Welcome to @yield('title')! </p>
                </div>
                <form class="form-floating" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="inputEmail" class="control-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{old('email')}}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="control-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="password" value="{{old('password')}}">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            Remember me </label>
                        </div>
                    </div>
                </div>
                <div class="card-action clearfix">
                    <div class="pull-right">
                        <button type="button" class="btn btn-link black-text">Forgot password</button>
                        <a href="{{route('register')}}" class="btn btn-link black-text">Register</a>
                        {{-- <button type="button" class="btn btn-link black-text">Login</button> --}}
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
