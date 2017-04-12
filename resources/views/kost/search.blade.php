@extends('layouts.app')

@section('content')
	@include('kost.list-kost')
	<div class="row">
		<div class="col-sm-12">
			{{ $dataKosts->links() }}
		</div>
	</div>
@endsection

@section('pluginsCss')
<style>
	.highlight
	{
		background-color: #FFFF88;
	}
</style>
@endsection

@section('script')
<script src="{{ asset('assets/js/jquery.highlight-5.js') }}"></script>
<script>
	$(".thumbnail").highlight("{{ $input }}");
</script>
@endsection