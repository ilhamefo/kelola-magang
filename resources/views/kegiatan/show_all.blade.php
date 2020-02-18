@extends('layouts.app')
@section('title', 'Home page')
@section('content')

<section class="cards">
    <div class="row justify-content-center">
@forelse ($kegiatan as $k)
{{-- {{dd($k)}} --}}
      <div class="col-md-3">
        <div class="card" style="width: 33rem;">
          <div class="card-image"> <img src="{{asset('img/photos/'. $k->image)}}"> <span class="card-title">Oleh: [{{$k->nama}}]</span>
          </div>
          <div class="card-content">
            <p>{{$k->uraian}}</p>
          </div>
          <div class="card-action clearfix">
            <div class="pull-right">
                @if (Auth::user()->id == $k->id_user)
                <a href="{{route('kegiatans.edit', ['kegiatan' => $k->id])}}" class="btn btn-link black-text">Edit</a>
                @endif
                <a href="{{route('kegiatans.show', ['kegiatan' => $k->id])}}" class="btn btn-link black-text">Detail</a>
              </div>
          </div>
        </div>
      </div>

@empty
<h1>No Data Found</h1>
@endforelse

</div>
</div>
</div>
</section>
@endsection
