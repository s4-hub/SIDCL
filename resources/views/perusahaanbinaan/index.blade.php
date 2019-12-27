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
	                    <a href="{{url('/perusahaanbinaan/add')}}" class="btn btn-primary btn-sm">
	                        Tambah Data
	                    </a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr align="center">
                                    <th>NPP</th>
                                    <th>Div</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Pembina</th>
                                    <th>Kantor</th>
                                    <th>Status Peserta</th>
                                    <th>Status Tag</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_perusahaanbinaan as $pu)
								<tr>
									<td><a href="{{url('/perusahaanbinaan/'.$pu->id.'/edit')}}">{{$pu->npp}}</a></td>
							  		<td>{{$pu->div}}</td>
							  		<td>{{$pu->nama}}</td>
							  		<td>{{$pu->pembina->name}}</td>
							  		<td>{{$pu->pembina->kantor->nama}}</td>
                                    <td>{{$pu->status_keps}}</td>
							  		<td align="center">{{$pu->status_tagging}}</td>
							  		<td align="center" width="120">
							  			<a href="{{url('/perusahaanbinaan/'.$pu->id.'/edit')}}" class="btn btn-warning btn-sm fa fa-edit" data-toggle="tooltip" title="Edit"></a>
                                        <a href="{{url('/perusahaanbinaan/'.$pu->id.'/destroy')}}" class="btn btn-danger btn-sm fa fa-trash-o" data-toggle="tooltip" title="Hapus" onclick="return confirm('Yakin! Data ini ingin dihapus?')"></a>
							  			<!-- <a href="#" class="btn btn-danger btn-sm fa fa-trash-o delete" data-toggle="tooltip" title="Hapus" perusahaanbinaan-id="{{$pu->id}}"></a> -->
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
			var perusahaanbinaan_id = $(this).attr('perusahaanbinaan-id');
			swal({
			  title: "Yakin?",
			  text: "Data dengan id "+perusahaanbinaan_id+ " ingin dihapus?",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			    window.location = "/perusahaanbinaan/"+perusahaanbinaan_id+"/destroy";
			    swal("Data berhasil dihapus", {
			      icon: "success",
			    });
			  }
			});
		});
	</script> -->
@endsection