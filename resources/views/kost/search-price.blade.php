@extends('layouts.app')

@section('content')
<div class="row">
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Cari Kost Berdasarkan Range Harga</h3>
		</div>
		<div class="box-body">
			<div class="col-md-12 col-sm-12">
				<form class="form-horizontal" action="{{ route('search.price.results') }}" enctype="multipart/form-data" method="POST">
            	{{ csrf_field() }}
              	{{ method_field('POST') }}
					<div class="form-group ">
						<input class="form-control" type="text" name="min" placeholder="minimal">
					</div>
					<div class="form-group ">
						<input class="form-control" type="text" name="max" placeholder="maksismal">
					</div>
					<div class="form-group col-sm-12">
						<button class="btn btn-block btn-lg btn-primary">Cari</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
{{-- list search results --}}
<div class="row">
	<div class="col-md-12 col-sm-12">
		@include('kost.list-kost')
	</div>
</div>
@endsection

@section('pluginsCss')
	<link href="{!! asset('assets/css/plugins/slider.css') !!}" rel="stylesheet">
@endsection

@section('script')
	<script src="{!! asset('assets/js/plugins/bootstrap-slider/bootstrap-slider.js') !!}"></script>
	<script src="{!! asset('assets/js/plugins/jQueryUI/jquery-ui.min.js') !!}"></script>
	<script>
		$(document).ready(function(){
			console.log('success');
			$("#slider").slider();
		});
	</script>
@endsection