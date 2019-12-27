@extends('layouts.master')

@section('title','Perusahaan Binaan')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data @yield('title')</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li><a href="{{url('/perusahaanbinaan')}}">@yield('title')</a></li>
                    <li class="active">Add Data</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Add</strong> Data
                    </div>
                    <div class="card-body card-block">
                        <form action="{{url('/perusahaanbinaan/create')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputText1">Nama Perusahaan</label>
                                <input name="nama" type="text" class="form-control {{$errors->has('nama') ? 'is-invalid' : ''}}" id="exampleInputText1" placeholder="Input Nama Perusahaan" value="{{old('nama')}}" required>
                                @if($errors->has('nama'))
                                    <div class="invalid-feedback">{{$errors->first('nama')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">NPP</label>
                                <input name="npp" type="text" class="form-control {{$errors->has('npp') ? 'is-invalid' : ''}}" id="exampleInputText1" placeholder="Input NPP Perusahaan" value="{{old('npp')}}" required>
                                @if($errors->has('npp'))
                                    <div class="invalid-feedback">{{$errors->first('npp')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">Divisi</label>
                                <input name="div" type="text" class="form-control {{$errors->has('div') ? 'is-invalid' : ''}}" id="exampleInputText1" placeholder="Input Divisi Perusahaan" value="{{old('div')}}" required>
                                @if($errors->has('div'))
                                    <div class="invalid-feedback">{{$errors->first('div')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Alamat</label>
                                <textarea name="alamat" id="textarea-input" rows="3" placeholder="Input Alamat Perusahaan" class="form-control">{{old('alamat')}}</textarea>
                                @if($errors->has('alamat'))
                                <div class="invalid-feedback">{{$errors->first('alamat')}}</div>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Add</strong> Data
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputText1">Jumlah TK Aktif</label>
                                <input name="jum_tk_aktif" type="text" class="form-control {{$errors->has('jum_tk_aktif') ? 'is-invalid' : ''}}" id="exampleInputText1" placeholder="Input Jumlah TK Aktif" value="{{old('jum_tk_aktif')}}" required>
                                @if($errors->has('jum_tk_aktif'))
                                    <div class="invalid-feedback">{{$errors->first('jum_tk_aktif')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="select" class=" form-control-label {{$errors->has('kantor_') ? 'is-invalid' : ''}}">Kantor</label>
                                <select name="kantor_id" id="select" class="form-control">
                                    <option value="0">Pilih Kantor</option>
                                    @foreach($data_kantor as $kantor)
                                        <option value="{{$kantor->id}}"{{(collect(old('kantor_id'))->contains($kantor->id) ? 'selected' : '')}}>{{$kantor->kode_kantor}} - {{$kantor->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file-input" class=" form-control-label">Foto</label>
                                <input type="file" id="file-input" name="foto" class="form-control-file">
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="row form-group">
                                    <div class="col col-lg-6">
                                        <label for="file-input" class=" form-control-label">Tentukan Koordinat Perusahaan</label>
                                    </div>
                                    <div class="col col-lg-6">
                                        <a href="https://www.google.com/maps/@3.5907326,98.6309199,12.75z" target="_blank" class="btn btn-primary btn-sm">Google Maps</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label class=" form-control-label">Latitude</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class=" form-control-label">Longitude</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input name="latx" type="text" class="form-control {{$errors->has('latx') ? 'is-invalid' : ''}}" id="exampleInputText1" placeholder="Input Latitude" value="{{old('latx')}}">
                                </div>
                                @if($errors->has('latx'))
                                    <div class="invalid-feedback">{{$errors->first('latx')}}</div>
                                @endif
                                <div class="col-12 col-md-6">
                                    <input name="laty" type="text" class="form-control {{$errors->has('laty') ? 'is-invalid' : ''}}" id="exampleInputText1" placeholder="Input Longitude" value="{{old('laty')}}">
                                </div>
                                @if($errors->has('laty'))
                                    <div class="invalid-feedback">{{$errors->first('laty')}}</div>
                                @endif
                            </div>
                    </div>
                    <div class="card-footer">
                            <button type="button" class="btn btn-secondary btn-sm" onclick="history.back()">Back</button>
                            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->
@endsection