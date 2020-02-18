@extends('layouts.app')
@section('title', 'Data Diri')
@section('content')
<div class="col-lg-12">
    <div class="card bordered">
        <div class="card-header alert alert-info"> <span class="card-title">Info</span> </div>
        <div class="card-content">
            <div class="container bootstrap snippet">
                <div class="row">
                    <div class="col-sm-10">
                        <h1>[{{$user->nim}}]</h1>
                    </div>
                </div>
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
                <div class="row">
                    <div class="col-sm-3">
                        <!--left col-->

                        <form action="{{route('admins.update', ['admin' => $user->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="text-center">
                            <img src="{{asset('img/photos/'. $user->profile_picture)}}"
                                class="avatar img-circle img-thumbnail" alt="avatar">
                            <h6>Upload a different photo...</h6>
                            <div class="form-group">
                                <span class="btn btn-info fileinput-button">
                                    <span>Pilih Foto</span>
                                    <input type="file" class="fileupload" name="profile_picture">
                                </span>
                            </div>
                            @error('profile_picture')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                    </div>
                    <!--/col-3-->
                    <div class="col-sm-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <hr>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="inputnama" class="control-label">Nama</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{$user->name}}">
                                            @error('nama')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="inputemail" class="control-label">email</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{$user->email}}">
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="inputphone" class="control-label">phone</label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{$user->phone}}">
                                            @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="inputaddress" class="control-label">address</label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{$user->address}}">
                                            @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="inputnim" class="control-label">nim</label>
                                            <input type="text" class="form-control" name="nim"
                                                value="{{$user->nim}}">
                                            @error('nim')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="inputasal_sekolah" class="control-label">asal_sekolah</label>
                                            <input type="text" class="form-control" name="asal_sekolah"
                                                value="{{$user->asal_sekolah}}">
                                            @error('asal_sekolah')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="inputjurusan" class="control-label">jurusan</label>
                                            <input type="text" class="form-control" name="jurusan"
                                                value="{{$user->jurusan}}">
                                            @error('jurusan')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="inputsemester" class="control-label">semester</label>
                                            <input type="text" class="form-control" name="semester"
                                                value="{{$user->semester}}">
                                            @error('semester')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Jenis Kelamin</label>
                                        <div class="col-lg-10">
                                          <div class="radio">
                                            <label class="filled">
                                              <input type="radio" name="jenis_kelamin" value="L" @if ($user->jenis_kelamin == 'L'){{'checked'}}@endif>Laki - Laki </label>
                                          </div>
                                          <div class="radio">
                                            <label class="filled">
                                              <input type="radio" name="jenis_kelamin" value="P" @if ($user->jenis_kelamin == 'P'){{'checked'}}@endif>Perempuan </label>
                                          </div>
                                        </div>
                                      </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <br>
                                            <button class="btn btn-lg btn-success" type="submit"><i
                                                    class="md md-save"></i> Save</button>
                                            <button class="btn btn-lg" type="reset"><i
                                                    class="md md-cancel"></i>
                                                Reset</button>
                                        </div>
                                    </div>
                                </form>

                                <hr>

                            </div>
                        </div>
                        <!--/tab-pane-->
                    </div>
                    <!--/tab-content-->

                </div>
                <!--/col-9-->
            </div>

        </div>
    </div>
</div>
@endsection
