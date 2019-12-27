@extends('layouts.master')

@section('title','Kantor')
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
                    <li><a href="{{url('/kantor')}}">@yield('title')</a></li>
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Data</strong> Kantor
                    </div>
                    <div class="card-body card-block">
                        <form action="{{url('/kantor/'.$kantor->id.'/update')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                          {{csrf_field()}}
                            @if($kantor->kci !== "901")@elseif($kantor->kci == $kantor->kode_kantor)
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">KCI</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="kci" id="select" class="form-control">
                                        <option value="A00" @if($kantor->kci == "A00") selected @endif>A00 - Kantor Cabang Lhokseumawe</option>
                                        <option value="A01" @if($kantor->kci == "A01") selected @endif>A01 - Kantor Cabang Banda Aceh</option>
                                        <option value="A02" @if($kantor->kci == "A02") selected @endif>A02 - Kantor Cabang Langsa</option>
                                        <option value="A03" @if($kantor->kci == "A03") selected @endif>A03 - Kantor Cabang Meulaboh</option>
                                        <option value="B00" @if($kantor->kci == "B00") selected @endif>B00 - Kantor Cabang Medan Kota</option>
                                        <option value="B01" @if($kantor->kci == "B01") selected @endif>B01 - Kantor Cabang Pematangsiantar</option>
                                        <option value="B02" @if($kantor->kci == "B02") selected @endif>B02 - Kantor Cabang Kisaran</option>
                                        <option value="B03" @if($kantor->kci == "B03") selected @endif>B03 - Kantor Cabang Padang Sidempuan</option>
                                        <option value="B04" @if($kantor->kci == "B04") selected @endif>B04 - Kantor Cabang Tanjung Morawa</option>
                                        <option value="B05" @if($kantor->kci == "B05") selected @endif>B05 - Kantor Cabang Medan Utara</option>
                                        <option value="B06" @if($kantor->kci == "B06") selected @endif>B06 - Kantor Cabang Binjai</option>
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Kode Kantor</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="kode_kantor" value="{{$kantor->kode_kantor}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                  <label for="text-input" class=" form-control-label">Nama Kantor</label>
                                </div>
                                <div class="col-12 col-md-9">
                                  <input type="text" id="text-input" name="nama" value="{{$kantor->nama}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Alamat</label>
                                </div>
                                <div class="col col-md-9">
                                    <textarea name="alamat" id="textarea-input" rows="3" placeholder="Input Alamat" class="form-control" required>{{$kantor->alamat}}</textarea>
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
@endsection