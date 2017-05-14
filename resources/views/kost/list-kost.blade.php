<div class="row">
@if($dataKosts->count() > 0)
	@foreach($dataKosts as $kost)
	  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <a href="{{ url('/kost-show',$kost->id) }}"><img src="{{ $kost->coverPhoto }}" alt="{{ $kost->name }}" class="img-thumbnail img-responsive" style="height: 250px; width: 350px;"></a>
		      <div class="caption">
		        <h3>{{ str_limit($kost->name." - ".$kost->city,25) }}</h3>
		        <p>{{ str_limit($kost->address,55) }}</p>
		        <h4>{{ str_limit($kost->descriptions,15) }}</h4>
		        <h4 class="text-primary">Rp.{{ number_format($kost->priceMonthly ,2,',','.') }}/Bln</h4>
		        <h4 class="text-success">Tersedia : {{ $kost->roomAvailable }} Kmr</h4>
		        <p>
		        	<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
		        	{{ $kost->hpAgent }}
		        </p>
		        <p>
		        {{-- tampilkan label kelamin --}}
		        @if($kost->gender)
	        		@if($kost->gender == 1)
	        			<button class="btn btn-info disabled">Laki-Laki</button>
	        		@elseif($kost->gender == 2)
	        			<button class="btn btn-success disabled">Perempuan</button>
	        		@else
	        			<button class="btn btn-danger disabled">Campur</button>
	        		@endif
		        @endif
		        </p>
		        <p><a href="{{ url('/kost-show',$kost->id) }}" class="btn btn-primary" role="button" target="_blank"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> | Lihat Kost</a></p>
		        {{-- jika kost milik user, tampilkan tombol edit --}}
		        @if(Auth::check())
			        @if($kost->user_id == Auth::id())
			        	<p><a href="{{ route('kost.edit',$kost->id) }}" class="btn btn-warning" role="button" target="_blank"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> | Edit Kost</a></p>
			        @endif
		        @endif
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