<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Order {{ Auth::user()->username }}</h3>

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
	                		<td>{{ $order->created_at->toDayDateTimeString() }}</td>
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