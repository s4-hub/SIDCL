@extends('layouts.master')

@section('title','Maps')
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>@yield('title')</h1>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Geolocation</h4>
                    </div>
                    <div class="card-body">
                    	<div id="map">
                    	</div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
    <!-- /# column -->
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
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