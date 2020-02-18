@extends('layouts.app')
@section('title', 'Home page')
@section('content')
<div class="row  m-b-40">
    <div class="col-md-3 col-md-push-9">
    </div>
    <div class="col-md-8 col-md-pull-3">
        <div class="well white">
            <form class="form-floating" action="{{route('kegiatans.update', ['kegiatan' => $kegiatan->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <fieldset>
                    <legend>Input product</legend> <span class="help-block">Please fill out the following form
                        below.</span>

                    <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                    <div class="form-group filled">
                        <label for="inputnama" class="control-label">nama</label>
                        <input type="text" class="form-control" name="nama" value="{{$kegiatan->nama}}" readonly>
                        @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group filled">
                        <div class="radio-inline">
                          <label class="filled">
                            <input type="radio" value="masuk" name="keterangan" @if ($kegiatan->keterangan == 'masuk') {{'checked'}} ? {{''}} @endif> Masuk </label>
                        </div>
                        <div class="radio-inline">
                          <label class="filled">
                            <input type="radio" value="libur" name="keterangan" @if ($kegiatan->keterangan == 'libur') {{'checked'}} ? {{''}} @endif> Libur </label>
                        </div>
                      </div>
                      @error('keterangan')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group filled">
                        <label for="uraian" class="control-label">Uraian Kegiatan</label>
                        <textarea class="form-control vertical" rows="3"
                            name="uraian">{{$kegiatan->uraian}}</textarea>
                    </div>
                    @error('uraian')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group filled"> <span class="btn btn-info fileinput-button">
                        <span>Pilih foto</span>
                        <input type="file" name="image">
                        </span>
                    </div>

                    {{-- <input type="file" name="foto"> --}}
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-default">Batal</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>



@endsection
