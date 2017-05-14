@extends('layouts.app')

@section('content')
<div class="row">
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Cari Kost Berdasarkan Range Harga</h3>
		</div>
		<div class="box-body">
			<div class="col-md-12 col-sm-12">
				<form action="">
					<div class="form-group">
						<input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200" data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red" id="slider">
					</div>
					<button class="btn btn-primary">Cari</button>
				</form>
			</div>
		</div>
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