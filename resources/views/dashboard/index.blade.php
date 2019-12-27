@extends('layouts.master')

@section('title','')
@section('content')
        <div class="content mt-3">

            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Selamat Datang, {{auth()->user()->name}}</span>
                    <br>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola data-data pada aplikasi ini atau pilih ikon-ikon pada Control Panel di bawah ini :
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <!--/.col-->
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <a href="{{url('/user')}}">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="fa fa-list text-success border-success"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Pengguna</div>
                                    <div class="stat-digit">{{$data_user->count()}}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <a href="{{url('/pembina')}}">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="fa fa-users text-primary border-primary"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Pembina</div>
                                    <div class="stat-digit">{{$data_pembina->count()}}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <a href="{{url('/kantor')}}">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="fa fa-suitcase text-warning border-warning"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Kantor</div>
                                    <div class="stat-digit">{{$data_kantor->count()}}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <a href="">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="fa fa-building-o text-danger border-danger"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Active Projects</div>
                                    <div class="stat-digit">770</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
@endsection