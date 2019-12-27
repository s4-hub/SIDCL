@extends('layouts.master')

@section('title','User')
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
                    <li><a href="{{url('/user')}}">@yield('title')</a></li>
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
                        <strong>Edit Data</strong> Pengguna
                    </div>
                    <div class="card-body card-block">
                        <form action="{{url('/user/'.$user->id.'/update')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                          {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Username</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$user->username}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                  <label for="text-input" class=" form-control-label">Nama Lengkap</label>
                                </div>
                                <div class="col-12 col-md-9">
                                  <input type="text" id="text-input" name="name" value="{{$user->name}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                  <label for="text-input" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                  <input type="text" name="email" value="{{$user->email}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Role</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="role" id="select" class="form-control" disabled>
                                        <option value="adminwilayah" @if($user->role == "adminwilayah") selected @endif>Admin Wilayah</option>
                                        <option value="admincabang" @if($user->role == "admincabang") selected @endif>Admin Cabang</option>
                                        <option value="pembina" @if($user->role == "pembina") selected @endif>Pembina</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Kantor</label></div>
                                <div class="col col-md-9">
                                    <select name="kantor_id" id="select" class="form-control">
                                        <option value="{{$user->kantor_id}}" @if($user->kantor_id == $user->kantor->id) selected @endif>{{$user->kantor->kode_kantor}} - {{$user->kantor->nama}}</option>
                                        @foreach($kantor as $kantor)
                                        @if($kantor->id !== $user->kantor->id)
                                            <option value="{{$kantor->id}}">{{$kantor->kode_kantor}} - {{$kantor->nama}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Aktif</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <div class="radio">
                                            <label for="radio1" class="form-check-label ">
                                                <input class="form-check-input" type="radio" name="aktif" value="Y" @if($user->aktif == "Y") checked @endif> Ya
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="radio2" class="form-check-label ">
                                                <input class="form-check-input" type="radio" name="aktif" value="N" @if($user->aktif == "N") checked @endif> Tidak
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
@endsection