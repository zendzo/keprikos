@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="col-lg-3 col-md-3 col-xs-6">
		<!-- small box -->
	      <div class="small-box bg-aqua">
	        <div class="inner">
	          <h3>{{ $totalOrdered }}</h3>

	          <p>Kost dipesan</p>
	        </div>
	        <div class="icon">
	          <i class="fa fa-shopping-bag" aria-hidden="true"></i>
	        </div>
	        <a href="{{ route('confirmation.list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	      </div>
		</div>
		<div class="col-lg-3 col-md-3 col-xs-6">
			<!-- small box -->
		  <div class="small-box bg-green">
		    <div class="inner">
		      <h3>{{ $totalRented }}</h3>

		      <p>Kost disewa</p>
		    </div>
		    <div class="icon">
		      <i class="fa fa-bar-chart" aria-hidden="true"></i>
		    </div>
		    <a href="{{ route('confirmation.paid') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		  </div>
		</div>
		<div class="col-lg-3 col-md-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $totalPending }}</h3>

              <p>Pending Konfirmasi</p>
            </div>
            <div class="icon">
              <i class="fa fa-check-circle" aria-hidden="true"></i>
            </div>
            <a href="{{ route('confirmation.pending') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
		</div>
		<div class="col-lg-3 col-md-3 col-xs-6">
         <!--  small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ Auth::user()->kosts()->sum('roomAvailable') }}</h3>

              <p>Sisa kamar tersedia</p>
            </div>
            <div class="icon">
              <i class="fa fa-pie-chart" aria-hidden="true"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
		</div>
		<div class="col-lg-12 col-md-12 col-xs-12">
			<h5 class="label-kost text-center bg-kost-label">Daftar Kost {{ Auth::user()->username }} Lainya :</h5>
			@include('kost.list-kost')
		</div>

	</div><!-- col-md-12 -->
</div>
@endsection

@section('script')
<!-- Morris Charts JavaScript -->
    <script src="{!! asset('assets/js/plugins/morris/raphael.min.js') !!}"></script>
    <script src="{!! asset('assets/js/plugins/morris/morris.min.js') !!}"></script>
    <script src="{!! asset('assets/js/plugins/morris/morris-data.js') !!}"></script>
@endsection
