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
                    <li class="active">@yield('title')</li>
                </ol>
            </div>
        </div>
    </div>
</div>
    
<div class="content mt-3">
	@if ($errors->any())
		<div class="alert alert-danger" role="alert">
	        @foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
		</div>
	@endif
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
	                		<a href="{{url('/user/export')}}" class="btn btn-success btn-sm  float-right" data-toggle="tooltip" title="Export Data"><i class="fa fa-download"></i> Export Data</a>
	                	</div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr align="center">
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aktif</th>
                                    <th>Kantor</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_user as $user)
								<tr>
									<td><a href="{{url('/user/'.$user->id.'/edit')}}">{{$user->username}}</td>
							  		<td>{{$user->name}}</td>
							  		<td>{{$user->email}}</td>
							  		<td>{{$user->role}}</td>
							  		<td align="center">{{$user->aktif}}</td>
							  		<td>{{$user->kantor->nama}}</td>
							  		<td align="center" width="100">
							  			<a href="{{url('/user/'.$user->id.'/edit')}}" class="btn btn-warning btn-sm fa fa-edit" data-toggle="tooltip" title="Edit"></a>
							  			<a href="{{url('/user/'.$user->id.'/destroy')}}" class="btn btn-danger btn-sm fa fa-trash-o" data-toggle="tooltip" title="Hapus" onclick="return confirm('Yakin! Data ini ingin dihapus?')"></a>
							  			<!-- <a href="#" class="btn btn-danger btn-sm fa fa-trash-o delete" data-toggle="tooltip" title="Hapus" user-id="{{$user->id}}"></a> -->
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
				<form action="{{url('/user/create')}}" method="POST">
					{{csrf_field()}}
					<div class="row form-group">
						<div class="col col-md-6">
					    	<label for="exampleInputText1">Nama Lengkap</label>
					    	<input name="name" type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="exampleInputText1" placeholder="Input Nama Lengkap" value="{{old('name')}}" required>
					    	@if($errors->has('name'))
					    		<div class="invalid-feedback">{{$errors->first('name')}}</div>
					    	@endif
				  		</div>
                        <div class="col-12 col-md-6">
					    	<label for="exampleInputText2">Username</label>
					    	<input name="username" type="text" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" id="exampleInputText2" placeholder="Input Username" value="{{old('username')}}" required>
					    	@if($errors->has('username'))
					    		<div class="invalid-feedback">{{$errors->first('username')}}</div>
					    	@endif
				  		</div>
				  	</div>				  	
				  	<div class="row form-group">
				  		<div class="col col-md-6">
					    	<label for="exampleInputEmail1">Email</label>
					    	<input name="email" type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Email" value="{{old('email')}}" required>
					    	@if($errors->has('email'))
					    		<div class="invalid-feedback">{{$errors->first('email')}}</div>
					    	@endif
				  		</div>
				  		<div class="col col-md-6">
					    	<label for="exampleInputPassword1">Password</label>
					    	<input name="password" type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="exampleInputPassword1" placeholder="Input Password" value="{{old('password')}}" required>
					    	@if($errors->has('name'))
					    		<div class="invalid-feedback">{{$errors->first('password')}}</div>
					    	@endif
				  		</div>
				  	</div>
				  	<div class="row form-group">
				  		<div class="col col-md-6">
					    	<label for="exampleInputText2">No HP</label>
					    	<input name="no_hp" type="text" class="form-control {{$errors->has('no_hp') ? 'is-invalid' : ''}}" id="exampleInputText3" placeholder="Input No HP" value="{{old('no_hp')}}" required>
					    	@if($errors->has('no_hp'))
					    		<div class="invalid-feedback">{{$errors->first('no_hp')}}</div>
					    	@endif
				  		</div>
				  		<div class="col col-md-6">
					  		<label for="select" class=" form-control-label {{$errors->has('kantor_') ? 'is-invalid' : ''}}">Kantor</label>
	                        <select name="kantor_id" id="select" class="form-control">
	                            <option value="0">Pilih Kantor</option>
	                            @foreach($data_kantor as $kantor)
	                            	<option value="{{$kantor->id}}"{{(collect(old('kantor_id'))->contains($kantor->id) ? 'selected' : '')}}>{{$kantor->kode_kantor}} - {{$kantor->nama}}</option>
	                            @endforeach
	                        </select>
                    	</div>
                    </div>
				  	<div class="form-group">
						<label for="exampleFormControlSelect1">Role</label>
						<select name="role" class="form-control" id="exampleFormControlSelect1" required>
					  		<option value="">Pilih Role</option>
					  		<option value="admin"{{(old('role') == 'superadmin') ? 'selected' : ''}}>Admin Wilayah</option>
					  		<option value="admin"{{(old('role') == 'admin') ? 'selected' : ''}}>Admin Cabang</option>
					  		<option value="pembina"{{(old('role') == 'pembina') ? 'selected' : ''}}>Pembina</option>
						</select>
				  	</div>
				  	<label for="exampleFormControlSelect1">Aktif </label>
				  	<br>
				  	<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="radio" name="aktif" id="inlineRadio1" value="Y"{{(old('aktif') == 'Y') ? 'checked' : ''}} checked="">
					  	<label class="form-check-label" for="inlineRadio1">Ya</label>
					</div>
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="radio" name="aktif" id="inlineRadio2" value="N"{{(old('aktif') == 'N') ? 'checked' : ''}}>
					  	<label class="form-check-label" for="inlineRadio2">Tidak</label>
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
      	<form action="{{url('/user/import')}}" method="POST" enctype="multipart/form-data">
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
			var user_id = $(this).attr('user-id');
			swal({
			  title: "Yakin?",
			  text: "Jika data dengan id "+user_id+ " ingin dihapus maka data pembina juga terhapus?",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			    window.location = "/user/"+user_id+"/destroy";
			    swal("Data berhasil dihapus", {
			      icon: "success",
			    });
			  }
			});
		});
	</script> -->
@endsection