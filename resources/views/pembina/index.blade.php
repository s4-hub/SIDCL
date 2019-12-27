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
                    <!-- <div class="card-header">
	                    <button type="button" class="btn btn-primary btn-sm float-left" data-toggle="modal" data-target="#mediumModal">
	                        Tambah Data
	                    </button>
                    </div> -->
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr align="center">
                                    <th>Username</th>
                                    <th>Nama Pembina</th>
                                    <th>No HP</th>
                                    <th>Kantor</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pembina as $pembina)
								<tr>
							  		<td align="center"><a href="{{url('/pembina/'.$pembina->id.'/edit')}}">{{$pembina->user->username}}</a></td>
							  		<td>{{$pembina->name}}</td>
							  		<td>{{$pembina->no_hp}}</td>
							  		<td>{{$pembina->kantor->nama}}</td>
							  		<td align="center" width="100">
							  			<a href="{{url('/pembina/'.$pembina->id.'/edit')}}" class="btn btn-warning btn-sm fa fa-edit" data-toggle="tooltip" title="Edit"></a>
							  			<a href="{{url('/pembina/'.$pembina->id.'/destroy')}}" class="btn btn-danger btn-sm fa fa-trash-o" data-toggle="tooltip" title="Hapus" onclick="return confirm('Yakin! Data ini ingin dihapus?')"></a>
                                        <!-- <a href="#" class="btn btn-danger btn-sm fa fa-trash-o delete" data-toggle="tooltip" title="Hapus" pembina-id="{{$pembina->id}}"></a> -->
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

<!-- <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
      		<div class="modal-body">
				<form action="{{url('/kantor/create')}}" method="POST">
					{{csrf_field()}}
					<div class="form-group">
				    	<label for="exampleInputText1">Kode Kantor</label>
				    	<input name="kode_kantor" type="text" class="form-control {{$errors->has('kode_kantor') ? 'is-invalid' : ''}}" id="exampleInputText1" placeholder="Input Kode Kantor" value="{{old('kode_kantor')}}" required>
				    	@if($errors->has('kode_kantor'))
				    		<div class="invalid-feedback">{{$errors->first('kode_kantor')}}</div>
				    	@endif
				  	</div>
				  	<div class="form-group">
				    	<label for="exampleInputText2">Nama Kantor</label>
				    	<input name="nama" type="text" class="form-control {{$errors->has('nama') ? 'is-invalid' : ''}}" id="exampleInputText2" placeholder="Input Nama Kantor" value="{{old('nama')}}" required>
				    	@if($errors->has('nama'))
				    		<div class="invalid-feedback">{{$errors->first('nama')}}</div>
				    	@endif
				  	</div>
				  	<div class="form-group">
                    	<label for="textarea-input" class=" form-control-label">Alamat</label>
                    	<textarea name="alamat" id="textarea-input" rows="9" placeholder="Input Alamat" class="form-control">{{old('alamat')}}</textarea>
                    	@if($errors->has('alamat'))
                    	<div class="invalid-feedback">{{$errors->first('alamat')}}</div>
			    		@endif
                    </div>
		    </div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary btn-sm">Submit</button>
				</form>
		    </div>
        </div>
    </div>
</div> -->
@endsection

@section('footer')
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<script>
		$('.delete').click(function(){
			var kantor_id = $(this).attr('kantor-id');
			swal({
			  title: "Yakin?",
			  text: "Data dengan id "+kantor_id+ " ingin dihapus?",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			    window.location = "/kantor/"+kantor_id+"/destroy";
			    swal("Data berhasil dihapus", {
			      icon: "success",
			    });
			  }
			});
		});
	</script> -->
@endsection