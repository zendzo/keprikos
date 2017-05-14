<a href="#" class="btn btn-success {{ $kost->user_id == Auth::id() ? "disabled":"" }}" style="width: 100%; margin-bottom: 10px;" data-toggle="modal" data-target="#modal">
<span class="glyphicon glyphicon-cart"></span> PESAN KOST
</a>

<div class="modal" id="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">×</span></button>
	          	<h4>Order Kost</h4>
			</div><!-- modal header -->

			<div class="modal-body">
				<div class="attachment-block clearfix">
	                <img class="attachment-img" src="{{ asset($kost->coverPhoto) }}" alt="Attachment Image">

	                <div class="attachment-pushed">
	                  <h4 class="attachment-heading">
	                  	<a href="#">Kost {{ $kost->name." - ".$kost->address." ".$kost->city }}</a>
	                  </h4>

	                  <div class="attachment-text">
	                    {{ $kost->descriptions }}<a href="#">more</a>
	                    <h4 class="text-success">Rp. {{ number_format($kost->priceMonthly ,0,'.',',') }}/bln</h4>
	                  </div>
	                  <!-- /.attachment-text -->
	                </div>
	                <!-- /.attachment-pushed -->
	              </div>

				<form action="{{ route('kost.order')}}" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<input type="hidden" name="kost_id" value="{{ $kost->id }}">
						<input type="hidden" name="priceMonthly" value="{{ $kost->priceMonthly }}">
					</div>
					<div class="form-group">
						<select name="totalMonths" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
		                  <option selected="selected">--Lama Sewa--</option>
		                  <option value="1">1 Bulan</option>
		                  <option value="2">2 Bulan</option>
		                  <option value="3">3 Bulan</option>
		                  <option value="4">4 Bulan</option>
		                  <option value="5">5 Bulan</option>
		                  <option value="6">6 Bulan</option>
		                  <option value="7">7 Bulan</option>
		                  <option value="8">8 Bulan</option>
		                  <option value="9">9 Bulan</option>
		                  <option value="10">10 Bulan</option>
		                  <option value="11">11 Bulan</option>
		                  <option value="12">1 Tahun</option>
		                </select>
					</div>
					<div class="form-group">
						<select name="qty" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
		                  <option selected="selected">Jumlah Kamar</option>
		                  @for($i=1; $i <= $kost->roomAvailable; $i++)
		                	<option value="{{ $i }}">{{ $i }} Kamar</option>
		                  @endfor
		                </select>
					</div>
			</div><!-- modal content -->

			<div class="modal-footer">
				<div class="form-group">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<button class="btn btn-primary" type="submit">Pesan</button>
					</div>
				</form><!-- /form -->
			</div>
		</div>
	</div>
</div>
