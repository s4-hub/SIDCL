@extends('layouts.master')

@section('title','Pembina')
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
                    <li><a href="{{url('/pembina')}}">@yield('title')</a></li>
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
                        <strong>Edit Data</strong> Pembina
                    </div>
                    <div class="card-body card-block">
                        <form action="{{url('/pembina/'.$pembina->id.'/update')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                          {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Username</label></div>
                                <div class="col-12 col-md-9">
                                    <p>{{$pembina->user->username}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText2">Nama Pembina</label>
                                <input type="text" id="text-input" name="name" value="{{$pembina->name}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText2">No HP</label>
                                <input type="text" id="text-input" name="no_hp" value="{{$pembina->no_hp}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="select" class=" form-control-label">Kantor</label>
                                <select name="kantor_id" id="select" class="form-control" disabled>
                                    <option value="{{$pembina->kantor_id}}" @if($pembina->kantor_id == $pembina->kantor->id) selected @endif>{{$pembina->kantor->kode_kantor}} - {{$pembina->kantor->nama}}</option>
                                    @foreach($kantor as $kantor)
                                    @if($kantor->id !== $pembina->kantor->id)
                                        <option value="{{$kantor->id}}">{{$kantor->kode_kantor}} - {{$kantor->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>
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