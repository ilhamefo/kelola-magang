@extends('layouts.app')
@section('title', 'Home page')
@section('content')


<div class="col-lg-12">
    <div class="card bordered">
      <div class="card-header alert alert-info"> <span class="card-title">Info</span> </div>
      <div class="card-content">
        <div class="row">
            <div class="col-lg-6">
                <div class="col-lg-6">
                    <h4>Nama:</h4>
                </div>
                <div class="col-lg-6">
                    <h4>{{$users->name}}</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="col-lg-6">
                    <h4>Email:</h4>
                </div>
                <div class="col-lg-6">
                    <h4>{{$users->email}}</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="col-lg-6">
                    <h4>No Telephone:</h4>
                </div>
                <div class="col-lg-6">
                    <h4>{{$users->phone}}</h4>
                </div>
            </div>
        </div>
      </div>
      <div class="card-action clearfix">
        <div class="pull-right"> <a href="#" class="btn btn-link black-text">Dismiss</a> </div>
      </div>
    </div>
</div>

@endsection
