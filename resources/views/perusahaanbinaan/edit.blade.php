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
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Data</strong> Perusahaan Binaan
                    </div>
                    <div class="card-body card-block">
                        <form action="{{url('/perusahaanbinaan/'.$perusahaanbinaan->id.'/update')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                          {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputText1">Nama Perusahaan</label>
                                <input name="nama" type="text" class="form-control" id="exampleInputText1" placeholder="Input Nama Perusahaan" value="{{$perusahaanbinaan->nama}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">NPP</label>
                                <input name="npp" type="text" class="form-control" id="exampleInputText1" placeholder="Input Nama Perusahaan" value="{{$perusahaanbinaan->npp}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">Divisi</label>
                                <input name="div" type="text" class="form-control" id="exampleInputText1" placeholder="Input Nama Perusahaan" value="{{$perusahaanbinaan->div}}" required>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Alamat</label>
                                <textarea name="alamat" id="textarea-input" rows="3" placeholder="Input Alamat Perusahaan" class="form-control">{{$perusahaanbinaan->alamat}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">Jumlah TK Aktif</label>
                                 <input name="jum_tk_aktif" type="text" class="form-control" id="exampleInputText1" placeholder="Input Nama Perusahaan" value="{{$perusahaanbinaan->jum_tk_aktif}}" required>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Data</strong> Perusahaan Binaan
                    </div>
                    <div class="card-body card-block">
                            <div class="form-group">
                                <label for="select" class=" form-control-label">Kantor</label>
                                <select name="kantor_id" id="select" class="form-control" disabled>
                                    <option value="{{$perusahaanbinaan->pembina->kantor_id}}" @if($perusahaanbinaan->pembina->kantor_id == $perusahaanbinaan->pembina->kantor->id) selected @endif>{{$perusahaanbinaan->pembina->kantor->kode_kantor}} - {{$perusahaanbinaan->pembina->kantor->nama}}</option>
                                    @foreach($kantor as $kantor)
                                    @if($kantor->id !== $perusahaanbinaan->pembina->kantor->id)
                                        <option value="{{$kantor->id}}">{{$kantor->kode_kantor}} - {{$kantor->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            @if(!$perusahaanbinaan->foto)
                            <div class="form-group">
                                <code>
                                    <strong>Foto saat ini belum ada!</strong>
                                </code>
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="row form-group">
                                    <div class="col-md-2">
                                        <label for="file-input" class=" form-control-label">Ganti Foto</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" id="file-input" name="foto" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                            @elseif($perusahaanbinaan->foto)
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="file-input" class=" form-control-label">Ganti Foto</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" id="file-input" name="foto" class="form-control-file">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col col-lg-12">
                                    <button type="button" class="btn btn-success btn-sm float-left" data-toggle="modal" data-target="#mediumModal">Lihat Foto saat ini</button>
                                </div>
                                <br>
                            </div>
                            <hr>
                            @endif
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
                                    <input name="latx" type="text" class="form-control {{$errors->has('latx') ? 'is-invalid' : ''}}" id="exampleInputText1" placeholder="Input Latitude" value="{{$perusahaanbinaan->latx}}">
                                </div>
                                @if($errors->has('latx'))
                                    <div class="invalid-feedback">{{$errors->first('latx')}}</div>
                                @endif
                                <div class="col-12 col-md-6">
                                    <input name="laty" type="text" class="form-control {{$errors->has('laty') ? 'is-invalid' : ''}}" id="exampleInputText1" placeholder="Input Longitude" value="{{$perusahaanbinaan->laty}}">
                                </div>
                                @if($errors->has('laty'))
                                    <div class="invalid-feedback">{{$errors->first('laty')}}</div>
                                @endif
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label">Status Peserta</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <div class="radio">
                                            <label for="radio1" class="form-check-label ">
                                                <input class="form-check-input" type="radio" name="status_keps" value="peserta" @if($perusahaanbinaan->status_keps == "peserta") checked @endif> Peserta
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="radio2" class="form-check-label ">
                                                <input class="form-check-input" type="radio" name="status_keps" value="nonaktif" @if($perusahaanbinaan->status_keps == "nonaktif") checked @endif> Nonaktif
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="history.back()">Back</button>
                        <button type="submit" class="btn btn-warning btn-sm">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->

<!-- Modal Tambah Data -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" align="center">
                    <img src="{{$perusahaanbinaan->checkPhoto()}}" alt="Card image cap" height="300" width="500"><br>
                    <label for="file-input" class=" form-control-label">{{$perusahaanbinaan->foto}}</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection