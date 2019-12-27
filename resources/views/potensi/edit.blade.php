@extends('layouts.master')

@section('title','Potensi')
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
                    <li><a href="{{url('/potensi')}}">@yield('title')</a></li>
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
                        <strong>Edit Data</strong> Potensi
                    </div>
                    <div class="card-body card-block">
                        <form action="{{url('/potensi/'.$potensi->id.'/update')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                          {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputText1">Nama Perusahaan</label>
                                <input name="nama" type="text" class="form-control" id="exampleInputText1" placeholder="Input Nama Perusahaan" value="{{$potensi->nama}}" required>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Alamat</label>
                                <textarea name="alamat" id="textarea-input" rows="3" placeholder="Input Alamat Perusahaan" class="form-control">{{$potensi->alamat}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">Jumlah TK Aktif</label>
                                 <input name="jum_tk_aktif" type="text" class="form-control" id="exampleInputText1" placeholder="Input Nama Perusahaan" value="{{$potensi->jum_tk_potensi}}" required>
                            </div>
                            <div class="form-group">
                                <label for="select" class=" form-control-label">Kantor</label>
                                <select name="kantor_id" id="select" class="form-control" disabled>
                                    <option value="{{$potensi->pembina->kantor_id}}" @if($potensi->pembina->kantor_id == $potensi->pembina->kantor->id) selected @endif>{{$potensi->pembina->kantor->kode_kantor}} - {{$potensi->pembina->kantor->nama}}</option>
                                    @foreach($kantor as $kantor)
                                    @if($kantor->id !== $potensi->pembina->kantor->id)
                                        <option value="{{$kantor->id}}">{{$kantor->kode_kantor}} - {{$kantor->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @if(!$potensi->foto)
                            <hr>
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
                            @elseif($potensi->foto)
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
                            
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Data</strong> Potensi
                    </div>
                    <div class="card-body card-block">
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
                                    <input name="latx" type="text" class="form-control {{$errors->has('latx') ? 'is-invalid' : ''}}" id="exampleInputText1" placeholder="Input Latitude" value="{{$potensi->latx}}">
                                </div>
                                @if($errors->has('latx'))
                                    <div class="invalid-feedback">{{$errors->first('latx')}}</div>
                                @endif
                                <div class="col-12 col-md-6">
                                    <input name="laty" type="text" class="form-control {{$errors->has('laty') ? 'is-invalid' : ''}}" id="exampleInputText1" placeholder="Input Longitude" value="{{$potensi->laty}}">
                                </div>
                                @if($errors->has('laty'))
                                    <div class="invalid-feedback">{{$errors->first('laty')}}</div>
                                @endif
                            </div>
                            <hr>
                            <div class="form-group">
                                <code>
                                    <strong>Silakan input NPP & Divisi Perusahaan jika status potensi diupdate menjadi "Peserta"</strong>
                                </code><br>
                                <label for="exampleInputText1">NPP</label>
                                <input name="npp" type="text" class="form-control {{$errors->has('npp') ? 'is-invalid' : ''}}" id="exampleInputText1" placeholder="Input NPP" value="{{old('npp')}}">
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
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label">Status Potensi</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <div class="radio">
                                            <label for="radio1" class="form-check-label ">
                                                <input class="form-check-input" type="radio" name="status_potensi" value="potensi" @if($potensi->status_potensi == "potensi") checked @endif> Potensi
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="radio2" class="form-check-label ">
                                                <input class="form-check-input" type="radio" name="status_potensi" value="peserta" @if($potensi->status_potensi == "peserta") checked @endif> Peserta
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
                    <img src="{{$potensi->checkPhoto()}}" alt="Card image cap" height="300" width="500"><br>
                    <label for="file-input" class=" form-control-label">{{$potensi->foto}}</label>
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