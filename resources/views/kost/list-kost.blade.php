<div class="row">
@if($dataKosts->count() > 0)
	@foreach($dataKosts as $kost)
	  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img src="{{ $kost->coverPhoto }}" alt="{{ $kost->name }}" class="img-thumbnail">
		      <div class="caption">
		        <h3>{{ $kost->name." - ".$kost->city }}</h3>
		        <p>{{ $kost->address }}</p>
		        <h4>{{ $kost->descriptions }}</h4>
		        <h4 class="text-primary">Rp.{{ $kost->priceMonthly }}/Bln</h4>
		        <h4 class="text-success">Tersedia : {{ $kost->roomAvailable }} Kmr</h4>
		        <p>
		        	<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
		        	{{ $kost->hpAgent }}
		        </p>
		        <p><a href="{{ url('/kost-show',$kost->id) }}" class="btn btn-primary" role="button" target="_blank"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> | Lihat Kost</a></p>
		        @if(Auth::check())
		        	<p>
		        	<favorite :kost={{ $kost->id }} :favorited={{ $kost->favorited() ? 'true':'false' }}></favorite>
		        </p>
		        @endif
		      </div>
		    </div>
		</div>
	@endforeach
@else
	<div class="col-sm-12">
		<div class="alert alert-warning alert-dismissible">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
	        Data yang anda cari belum belum tersedia.
	  </div>
	</div>
@endif
</div>