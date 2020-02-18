@extends('layouts.app')
@section('title', 'Verifikasi Email')
@section('content')
<div class="col-lg-8">
    <div class="card bordered">
      <div class="card-header alert alert-danger"> <span class="card-title">{{ __('Verify Your Email Address') }}</span> </div>
      <div class="card-content">
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif
        <p>{{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},</p>
      </div>
      <div class="card-action clearfix">
        <div class="pull-right">
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link black-text">{{ __('click here to request another') }}</button>.
        </form>
        </div>

      </div>
    </div>
  </div>
@endsection
