@extends('layouts.app')
@section('title', 'Home page')
@section('content')
    <section class="cards">
      <div class="row">
        <div class="col-md-4">
          <div class="card h-100">
            <div class="card-image"> <img src="{{asset('img/photos/'. $kegiatan->image)}}"> <span class="card-title">Oleh: [{{$kegiatan->nama}}]</span>
            </div>
            <div class="card-content">
              <p>{{$kegiatan->uraian}}</p>
            </div>
            <div class="card-action clearfix">
              <div class="pull-right">
                @if (Auth::user()->id == $kegiatan->id_user)
                <a href="{{route('kegiatans.edit', ['kegiatan' => $kegiatan->id])}}" class="btn btn-link black-text">Edit</a>
                @endif
                </div>
            </div>
          </div>
        </div>
          </div>
        </div>
      </div>
    </section>
@endsection
