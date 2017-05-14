@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
		<div class="panel-heading">
			<h5>
				<span class="glyphicon glyphicon-home"></span> Kost {{ $kost->name." - ".$kost->address }}
			</h5>
		</div>
			<div class="panel-body">
				<div class="thumbnail">
					<div id="PhotoKostCarousel" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
					  @for ($i=0; $i < $dataPhotos->count(); $i++)
					  	@if($dataPhotos->first())
					    <li data-target="#PhotoKostCarousel" data-slide-to="{{ $i }}" class="active">
					    @else
					    <li data-target="#PhotoKostCarousel" data-slide-to="{{ $i }}"></li>
					    @endif
					    </li>
					  @endfor
					  </ol>

					  <!-- Wrapper for slides -->
					  <div class="carousel-inner" role="listbox">

					    <div class="item active">
					      <img src="{{ asset($kost->coverPhoto) }}">
					      <div class="carousel-caption">
					        {{ $kost->descriptions }}
					      </div>
					    </div>

					    @if($kost->roomInsidePhoto)
					    <div class="item">
					      <img src="{{ asset($kost->buildingPhoto) }}">
					    </div>
					    @endif

					    <div class="item">
					      <img src="{{ asset($kost->roomFrontPhoto) }}">
					    </div>

					    @if($kost->roomInsidePhoto)
					    <div class="item">
					      <img src="{{ asset($kost->roomInsidePhoto) }}">
					    </div>
					    @endif

					    @if($kost->toiletFrontPhoto)
					    <div class="item">
					      <img src="{{ asset($kost->toiletFrontPhoto) }}">
					    </div>
					    @endif

					    @if($kost->toiletInsidePhoto)
					    <div class="item">
					      <img src="{{ asset($kost->toiletInsidePhoto) }}">
					    </div>
					    @endif

					    @if($kost->otherFacility)
					    <div class="item">
					      <img src="{{ asset($kost->otherFacilityPhoto) }}">
					    </div>
					    @endif
					  </div>

					  <!-- Left and right controls -->
					  <a class="left carousel-control" href="#PhotoKostCarousel" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#PhotoKostCarousel" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
				<div class="row">
						<div class="col-md-8">
							<div class="col-md-8">
								<h4>Kost {{ $kost->name." - ".$kost->address." ".$kost->city }}</h4>
							</div>
							<div class="col-md-4">
								@if($kost->gender == 1)
									<a href="#" class="btn btn-success">Laki-Laki</a>
								@elseif($kost->gender == 2)
									<a href="#" class="btn btn-info" style="width: 100%;">Campur</a>
								@else
									<a href="#" class="btn btn-warning" style="width: 100%;">Campur</a>
								@endif
							</div>
							<div class="col-md-12">
								<div class="col-md-4">
									<h5 class="label-kost text-center bg-kost-label">Fasilitas Kamar</h5>
									<h5 class="label-kost text-center bg-kost-label">Luas Kamar</h5>
									<h5 class="label-kost text-center bg-kost-label">Kamar Mandi</h5>
									<h5 class="label-kost text-center bg-kost-label">Fasilitas Umum</h5>
									<h5 class="label-kost text-center bg-kost-label">Fasilitas Umum Lain</h5>
									<h5 class="label-kost text-center bg-kost-label">Parkir</h5>
									<h5 class="label-kost text-center bg-kost-label">Akses Lingkungan</h5>
									<h5 class="label-kost text-center bg-kost-label">Keterangan Lain</h5>
									<h5 class="label-kost text-center bg-kost-label">Deskripsi</h5>
								</div>
								<div class="col-md-8">
									<h5 class="label-kost">{{ $kost->roomFacility }}</h5>
									<h5 class="label-kost">{{ $kost->size }}</h5>
									<h5 class="label-kost">{{ $kost->bathRoomFacility }}</h5>
									<h5 class="label-kost">{{ $kost->generalFacility }}</h5>
									<h5 class="label-kost">{{ $kost->otherGeneralFacility }}</h5>
									<h5 class="label-kost">
										@if($kost->parking == 1)
										Mobil
										@elseif($kost->parking == 2)
										Motor
										@else
										Sepeda
										@endif
									</h5>
									<h5 class="label-kost">{{ $kost->nearByFacility,$kost->otherNearByFacility }}</h5>
									<h5 class="label-kost">{{ $kost->remarks }}</h5>
									<h5 class="label-kost">{{ $kost->descriptions }}</h5>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<div class="panel-title">ADA {{ $kost->roomAvailable }} KAMAR</div>
								</div>
								<div class="panel-body">
									<table class="table table-bordered">
										<tr>
											<th>Rp. {{ number_format($kost->priceYearly ,2,',','.') }}</th>
											<th>/tahun</th>
										</tr>
										<tr>
											<th>Rp. {{ number_format($kost->priceMonthly ,2,',','.') }}</th>
											<th>/bulan</th>
										</tr>
										<tr>
											<th>Rp. {{ number_format($kost->priceWeekly ,2,',','.') }}</th>
											<th>/minggu</th>
										</tr>
										<tr>
											<th>Rp. {{ number_format($kost->priceDaily ,2,',','.') }}</th>
											<th>/hari</th>
										</tr>
										<tr>
											<th colspan="2" class="text-success">Pembayaran min : Rp.  {{ $kost->minPay * $kost->priceMonthly }}</th>
										</tr>
									</table>
									@if(Auth::check())
										@include('partials.order-button.order')
									@else
										@include('partials.order-button.contact')
									@endif
										<table class="table">
											<tr>
												<th class="text-center text-success">
													<p>Update terakhir pada :</p>
													<p>{{ $kost->updated_at }}</p>
													<h6>* data bisa berubah sewaktu-waktu</h6>
												</th>
											</tr>
										</table>
								</div>
							</div>
						</div>
				</div>
			</div>
			<h5 class="label-kost bg-kost-label text-center">Peta Lokasi</h5>
			<div class="panel-footer">
				<div id="kostMapLocation" style="width: 100%;height: 400px"></div>
			</div>
		</div>
	</div>
</div>
	@if(count($dataKosts) > 1)
		<h5 class="label-kost bg-kost-label text-center">Rekomendasi Kost Menarik Lainnya :</h5>
		@include('kost.list-kost')
	@else
		<h5 class="label-kost bg-kost-label text-center">Belum Anda Rekomendasi Lainya Dari Kota {{ $kost->city }}</h5>
	@endif
@endsection

@section('script')
<script>
function showMap() {
        var uluru = {lat: {{ $kost->latitude }}, lng: {{$kost->longitude}} };
        var map = new google.maps.Map(document.getElementById('kostMapLocation'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
        var contentString = "<div class='col-sm-12'><h4>{{ $kost->name }}</h4><p>{{ $kost->address }}</p><p class='text-success'>tersedia : {{ $kost->roomAvailable }} kamar</p></div>";

        var infoWindow = new google.maps.InfoWindow({
        	content: contentString,
        	maxWidth: 200
        });

        marker.addListener('click',function(){
        	infoWindow.open(map, marker);
        });

        infoWindow.open(map,marker);
      }

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVHgvRIsfyRFZncJe1GDq5c9oOBtyVa6s&callback=showMap">
</script>
@endsection

@section('pluginsCss')
<style>

</style>
@endsection