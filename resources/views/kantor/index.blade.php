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
	                    <div class="col-2">
                    		<button type="button" class="btn btn-primary btn-sm float-left" data-toggle="modal" data-target="#mediumModal">Tambah Data</button>
	                	</div>
	                	<div class="col-lg-3 float-right">
	                    	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importData" title="Import Data"><i class="fa fa-upload"></i> Import Data</button>
	                		<a href="{{url('/kantor/export')}}" class="btn btn-success btn-sm  float-right" data-toggle="tooltip" title="Export Data"><i class="fa fa-download"></i> Export Data</a>
	                	</div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr align="center">
                                	<th>KCI</th>
                                    <th>Kode Kantor</th>
                                    <th>Nama Kantor</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_kantor as $kantor)
								<tr>
							  		<td align="center">{{$kantor->kci}}</td>
							  		<td align="center">{{$kantor->kode_kantor}}</td>
							  		<td>{{$kantor->nama}}</td>
							  		<td>{{$kantor->alamat}}</td>
							  		<td align="center" width="100">
							  			<a href="{{url('/kantor/'.$kantor->id.'/edit')}}" class="btn btn-warning btn-sm fa fa-edit" data-toggle="tooltip" title="Edit"></a>
							  			<a href="{{url('/kantor/'.$kantor->id.'/destroy')}}" class="btn btn-danger btn-sm fa fa-trash-o" data-toggle="tooltip" title="Hapus" onclick="return confirm('Yakin! Data ini ingin dihapus?')"></a>
							  			<!-- <a href="#" class="btn btn-danger btn-sm fa fa-trash-o delete" data-toggle="tooltip" title="Hapus" kantor-id="{{$kantor->id}}"></a> -->
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
				<form action="{{url('/kantor/create')}}" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<label for="exampleFormControlSelect1">KCI</label>
						<select name="kci" class="form-control" id="exampleFormControlSelect1" required>
					  		<option value="">Pilih KCI</option>
					  		<option value="A00"{{(old('kci') == 'A00') ? 'selected' : ''}}>A00 - Kantor Cabang Lhokseumawe</option>
					  		<option value="A01"{{(old('kci') == 'A01') ? 'selected' : ''}}>A01 - Kantor Cabang Banda Aceh</option>
					  		<option value="A02"{{(old('kci') == 'A02') ? 'selected' : ''}}>A02 - Kantor Cabang Langsa</option>
					  		<option value="A03"{{(old('kci') == 'A03') ? 'selected' : ''}}>A03 - Kantor Cabang Meulaboh</option>
					  		<option value="B00"{{(old('kci') == 'B00') ? 'selected' : ''}}>B00 - Kantor Cabang Medan Kota</option>
					  		<option value="B01"{{(old('kci') == 'B01') ? 'selected' : ''}}>B01 - Kantor Cabang Pematangsiantar</option>
					  		<option value="B02"{{(old('kci') == 'B02') ? 'selected' : ''}}>B02 - Kantor Cabang Kisaran</option>
					  		<option value="B03"{{(old('kci') == 'B03') ? 'selected' : ''}}>B03 - Kantor Cabang Padang Sidempuan</option>
					  		<option value="B04"{{(old('kci') == 'B04') ? 'selected' : ''}}>B04 - Kantor Cabang Tanjung Morawa</option>
					  		<option value="B05"{{(old('kci') == 'B05') ? 'selected' : ''}}>B05 - Kantor Cabang Medan Utara</option>
					  		<option value="B06"{{(old('kci') == 'B06') ? 'selected' : ''}}>B06 - Kantor Cabang Binjai</option>
						</select>
				  	</div>
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
                    	<textarea name="alamat" id="textarea-input" rows="3" placeholder="Input Alamat" class="form-control">{{old('alamat')}}</textarea>
                    	@if($errors->has('alamat'))
                    	<div class="invalid-feedback">{{$errors->first('alamat')}}</div>
			    		@endif
                    </div>
		    </div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success btn-sm">Submit</button>
				</form>
		    </div>
        </div>
    </div>
</div>

<!-- Modal Import Data -->
<div class="modal fade" id="importData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="{{url('/kantor/import')}}" method="POST" enctype="multipart/form-data">
      		{{csrf_field()}}
      		<div class="form-group">
                <label for="file" class=" form-control-label">Import</label>
                <input type="file" id="file" name="file" class="form-control-file">
                @if($errors->has('file'))
		    		<div class="invalid-feedback">{{$errors->first('file')}}</div>
		    	@endif
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success btn-sm" value="Import">
      	</form>
      </div>
    </div>
  </div>
</div>	
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