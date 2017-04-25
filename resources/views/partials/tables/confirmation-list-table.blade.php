<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Kost dipesan User : {{ Auth::user()->username }}</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Kost</th>
                  <th>Banyak kamar</th>
                  <th>Lama sewa</th>
                  <th>Total bayar</th>
                  <th>Status</th>
                  <th>Tgl. Masuk</th>
                  <th>Tgl. Keluar</th>
                  <th>Tgl. Pesan</th>
                  <th>Konf. Order</th>
                </tr>
	                @forelse($orders as $order)
	                	<tr>
	                		<td>{{ $order->id }}</td>
	                		<td><a href="{{ url('kost-show',$order->kost_id ) }}">Lihat Kost</a></td>
	                		<td>{{ $order->qty }} Kamar</td>
	                		<td>{{ $order->total_month }} Bln</td>
	                		<td>Rp. {{ number_format($order->total_price,2) }}</td>
	                		{{-- jika tanggal order kosong tampilkan pending --}}
	                			@if(is_null($order->paid_at))
	                				<td><span class="label label-danger">Pending</span></td>
	                			@else
	                				<td><span class="label label-primary">Dibayar</span></td>
	                			@endif
	                			{{-- jika tgl keluar dan masuk kosong tampilkan pending --}}
	                			@if($order->day_in == null and $order->day_out == null)
	                				<td><span class="label label-danger">Pending</span></td>
	                				<td><span class="label label-danger">Pending</span></td>
	                			@else
	                				<td><span class="label label-success">{{$order->day_in }}</span></td>
	                				<td><span class="label label-success">{{ $order->day_out }}</span></td>
	                			@endif
	                		<td>{{ $order->created_at->toFormattedDateString() }}</td>
                      <td>
                        @if(is_null($order->paid_at))
                          <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modal">
                            Confirm <i class="fa fa-check" aria-hidden="true"></i>
                          </a>
                          <div class="modal" id="modal">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  <h4>Konfirmasi Order</h4>
                                </div><!-- modal header -->

                                <div class="modal-body">
                                  <div class="attachment-block clearfix">
                                    {{-- <img class="attachment-img" src="" alt="Attachment Image"> --}}

                                    <div class="attachment-pushed">
                                      <h4 class="attachment-heading">
                                        <a href="#"></a>
                                      </h4>

                                      <div class="attachment-text">
                                        <h4>Sewa {{ $order->qty }} Kamar</h4>
                                        <h4>Selama {{ $order->total_month }} Bulan</h4>
                                        <h4>
                                          Mulai : 
                                          {{ \Carbon\Carbon::now()->toFormattedDateString() }}
                                        </h4>
                                        <h4>
                                        Berakhir : 
                                          {{ \Carbon\Carbon::now()->addMonths($order->total_month)
                                                              ->toFormattedDateString() }}
                                        </h4>
                                        <a href="{{ url('kost-show',$order->kost_id ) }}">Lihat Kost</a>
                                        <h4 class="text-success">Rp. {{ number_format($order->total_price,2) }}</h4>
                                      </div>
                                      <!-- /.attachment-text -->
                                    </div>
                                    <!-- /.attachment-pushed -->
                                  </div>
                                  <form action="{{ route('confirmation.store') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                      <input type="hidden" name="id" value="{{ $order->id }}">
                                    </div>
                                    <button class="btn btn-success">Konfirmasi Order</button>
                                  </form>
                                </div>
                              </div><!-- modal content -->

                              <div class="modal-footer">

                              </div><!-- modal footer -->
                            </div>
                          </div>
                        @else
                          <a href="#" class="btn btn-success" disabled>Confirmed</a>
                        @endif
                      </td>
	                	</tr>
	                @empty
	                @endforelse
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>