@extends('layouts.app')
@section('title', 'Home page')
@section('content')
<div class="row  m-b-40">
    <div class="col-md-3 col-md-push-9">
    </div>
    <div class="col-md-8 col-md-pull-3">
        <div class="well white">
            <form class="form-floating" action="{{route('admins.store')}}" method="POST">
                @csrf
                <fieldset>
                    <legend>Input Siswa Baru</legend>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                        <div class="form-group">
                            <label for="name" class="control-label">name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="nim" class="control-label">nim</label>
                            <input type="text" class="form-control" name="nim" value="{{old('nim')}}">
                            @error('nim')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="phone" class="control-label">phone</label>
                        <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="address" class="control-label">address</label>
                            <input type="text" class="form-control" name="address" value="{{old('address')}}">
                            @error('address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="email" class="control-label">email</label>
                            <input type="text" class="form-control" name="email" value="{{old('email')}}">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="radio-inline">
                              <label class="filled">
                                <input type="radio" value="L" name="jenis_kelamin">Laki - Laki</label>
                            </div>
                            <div class="radio-inline">
                              <label class="filled">
                                <input type="radio" value="P" name="jenis_kelamin">Perempuan</label>
                            </div>
                          </div>
                          @error('jenis_kelamin')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror

                        <div class="form-group">
                            <label for="asal_sekolah" class="control-label">asal_sekolah</label>
                            <input type="text" class="form-control" name="asal_sekolah" value="{{old('asal_sekolah')}}">
                            @error('asal_sekolah')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="jurusan" class="control-label">jurusan</label>
                            <input type="text" class="form-control" name="jurusan" value="{{old('jurusan')}}">
                            @error('jurusan')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="semester" class="control-label">semester</label>
                            <input type="text" class="form-control" name="semester" value="{{old('semester')}}">
                            @error('semester')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label">password</label>
                            <input type="password" class="form-control" name="password">
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
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
