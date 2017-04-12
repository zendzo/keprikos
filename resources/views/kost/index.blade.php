@extends('layouts.app')

@section('content')
@include('kost.list-kost')
	<div class="row">
		<div class="col-sm-12 col-md-12">
			{{ $dataKosts->links() }}
		</div>
	</div>
@endsection