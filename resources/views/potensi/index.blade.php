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
                    <li class="active">@yield('title')</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
	                    <a href="{{url('/potensi/add')}}" class="btn btn-primary btn-sm">
	                        Tambah Data
	                    </a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr align="center">
                                    <th>Nama Perusahaan</th>
                                    <th>Pembina</th>
                                    <th>Kantor</th>
                                    <th>Status Potensi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_potensi as $potensi)
								<tr>
							  		<td><a href="{{url('/potensi/'.$potensi->id.'/edit')}}">{{$potensi->nama}}</a></td>
							  		<td>{{$potensi->pembina->name}}</td>
							  		<td>{{$potensi->pembina->kantor->nama}}</td>
							  		<td align="center">{{$potensi->status_potensi}}</td>
							  		<td align="center" width="120">
							  			<a href="{{url('/potensi/'.$potensi->id.'/edit')}}" class="btn btn-warning btn-sm fa fa-edit" data-toggle="tooltip" title="Edit"></a>
                                        <a href="{{url('/potensi/'.$potensi->id.'/destroy')}}" class="btn btn-danger btn-sm fa fa-trash-o" data-toggle="tooltip" title="Hapus" onclick="return confirm('Yakin! Data ini ingin dihapus?')"></a>
							  			<!-- <a href="#" class="btn btn-danger btn-sm fa fa-trash-o delete" data-toggle="tooltip" title="Hapus" potensi-id="{{$potensi->id}}"></a> -->
							  		</td>
								</tr>
								@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection

@section('footer')
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<script>
		$('.delete').click(function(){
			var potensi_id = $(this).attr('potensi-id');
			swal({
			  title: "Yakin?",
			  text: "Data dengan id "+potensi_id+ " ingin dihapus?",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			    window.location = "/potensi/"+potensi_id+"/destroy";
			    swal("Data berhasil dihapus", {
			      icon: "success",
			    });
			  }
			});
		});
	</script> -->
@endsection