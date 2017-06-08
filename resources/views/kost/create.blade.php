@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-6">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Pendaftaran Kost KepriKost</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('kost.store') }}" enctype="multipart/form-data" method="POST">
            	{{ csrf_field() }}
              <div class="box-body">
                <!-- form group -->
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Nama Kost</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="name" id="inputName" placeholder="(ex: Kost Mawar Bintan)" type="text" required value="{{ old('name') }}">
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputAddress" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <input class="gllpLocationName form-control" name="address" value="{{ old('address') }}" id="inputAddress" placeholder="(ex: Jl. Ir. Rahman Hakim)" type="text" required>
                  </div>
                </div>
              <!-- form group -->
                <div class="form-group">
                  <label for="inputOwner" class="col-sm-2 control-label">Pemilik Kost</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="owner" value="{{ old('owner') }}" id="inputOwner" placeholder="(ex: Rio / isi dengan (-) jika kosong)" type="text" value="{{ Auth::user()->username }}" required>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputOwnerPhone" class="col-sm-2 control-label">Nomor Kontak Pemilik</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="ownerPhone" value="{{ old('ownerPhone') }}" id="inputOwnerPhone" placeholder="(ex: 08xxx / isi dengan (-) jika kosong)" type="text" required>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputManager" class="col-sm-2 control-label">Pengelola Kost</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="manager" value="{{ old('manager') }}" id="inputManager" placeholder="(ex: Rio / isi dengan (-) jika kosong)" type="text" value=" {{ Auth::user()->username }}" required>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputManagerPhone" class="col-sm-2 control-label">Nomor Kontak Pengelola</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="managerPhone" value="{{ old('managerPhone') }}" id="inputManagerPhone" placeholder="(ex: 08xxx / isi dengan (-) jika kosong)" type="text" required>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputPhone" class="col-sm-2 control-label">Nomor Telp Kost</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="phone" value="{{ old('phone') }}" id="inputPhone" placeholder="(ex: ex: 08xxx / isi dengan (-) jika kosong)" type="text" required>
                  </div>
                </div>
                <!-- Info Upload Photo -->
                <div class="col-sm-12">
                	<div class="callout callout-info text-left">
                		<h4><i class="icon fa fa-info"></i> Pastikan Alamat Anda Sesuai.</h4>
		                <p>Lengkapi data alamat anda dengan map, agar pelanggan mudah menemukan kost anda!</p>
	              	</div>
                </div>
                <!-- google map -->
                <div class="gllpLatlonPicker">
                	<!-- form group -->
	                <div class="form-group">
	                	<label for="inputGeoName" class="col-sm-2 control-label">Lokasi Kost</label>

	                	<div class="col-sm-7">
						    <input class="gllpSearchField gllpLocationName form-control" name="geoName" id="inputGeoName" placeholder="Masukan alamat/nama temoat (contoh : Batam)" type="text" required>
						</div>
							<input type="button" class="gllpSearchButton btn btn-warning col-sm-2" value="search">
					</div><!-- form group 1 google map -->
					<!-- form group -->
					<div class="form-group">
					<label for="" class="col-sm-2 control-label"></label>

						<div class="col-sm-10">
							<div class="gllpMap"></div>
						</div>
					</div><!-- form group 2 google map -->
					<!-- form group -->
					<div class="form-group">
						<label for="" class="col-sm-2 control-label"></label>

						<div class="col-sm-5">
							<span><b>Latitude</b></span>
							<input class="gllpLatitude form-control" name="latitude" type="text" required/>
						</div>
						<div class="col-sm-5">
							<span><b>Longitude</b></span>
							<input class="gllpLongitude form-control" name="longitude" type="text" required/>
							<input type="text" class="gllpZoom hidden" value="15"/>
						</div>
					</div><!-- form group 3 google maap -->
					<!-- form group -->
					<div class="form-group">
						<label for="" class="col-sm-2 control-label"></label>
						<div class="col-sm-5">
							<span><b>Subdistrict</b></span>
							<input class="gllSubdistrict form-control disabled" name="subdistrict" type="text" required/>
						</div>
						<div class="col-sm-5">
							<span><b>City/Region</b></span>
							<input class="gllCity form-control disabled" name="city" type="text" required/>
						</div>
					</div><!-- form group 4 google map -->
                </div><!-- end div google map -->
               {{-- remove sewa harian mingguan --}}
                <!-- form group -->
                <div class="form-group">
                  <label for="inputPriceMonthly" class="col-sm-2 control-label">Harga Sewa Bulanan</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="priceMonthly" value="{{ old('priceMonthly') }}" id="inputPriceMonthly" placeholder="(ex: 15000000)" type="text" required>
                  </div>
                </div>
                 {{-- remove sewa tahunan --}}
                <!-- form group -->
                <div class="form-group">
                  <label for="inputMinPay" class="col-sm-2 control-label">Pembayaran Minimal</label>

                  <div class="col-sm-10">
                    <select name="minPay" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
	                  <option selected="selected">--Optional--</option>
	                  <option value="2">Minimal 2 Bulan</option>
	                  <option value="3">Minimal 3 Bulan</option>
	                  <option value="4">Minimal 4 Bulan</option>
	                  <option value="5">Minimal 5 Bulan</option>
	                  <option value="6">Minimal 6 Bulan</option>
	                  <option value="7">Minimal 7 Bulan</option>
	                  <option value="8">Minimal 8 Bulan</option>
	                  <option value="9">Minimal 9 Bulan</option>
	                  <option value="10">Minimal 10 Bulan</option>
	                  <option value="11">Minimal 11 Bulan</option>
	                  <option value="12">Minimal 1 Tahun</option>
	                </select>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputPriceRemark" class="col-sm-2 control-label">Keterangan Biaya Lain</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" name="priceRemark" value="{{ old('priceRemark') }}" id="inputPriceRemark" placeholder="(ex: Minimal bayar untuk berapa bulan di depan) *Maks 255 karakter" type="text"></textarea>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputRoomCount" class="col-sm-2 control-label">Jumlah Kamar</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="roomCount" value="{{ old('roomcount') }}" id="inputRoomCount" placeholder="(ex: 10)" type="number" required="number">
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputSize" class="col-sm-2 control-label">Luas Kamar</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="size" value="{{ old('size') }}" id="inputSize" placeholder="(ex: 3x3)" type="text" required>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputGender" class="col-sm-2 control-label">Jenis Penghuni</label>

                  <div class="col-sm-10">
                    <select name="gender" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
	                  <option selected="selected">--Optional--</option>
	                  <option value="1">Laki - Laki</option>
	                  <option value="2">Perempuan</option>
	                  <option value="3">Campur</option>
	                </select>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputStatus" class="col-sm-2 control-label">Status Kamar</label>

                  <div class="col-sm-10">
                    <select name="status" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
	                  <option selected="selected">--Optional--</option>
	                  <option value="0">Kosong</option>
	                  <option value="1">Penuh</option>
	                </select>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputRoomAvailable" class="col-sm-2 control-label">Jumlah Kamar Kosong</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="roomAvailable" value="{{ old('roomAvailable') }}" id="inputRoomAvailable" placeholder="(ex: 5) *sesuaikan dengan status kamar kosong saat ini (isi 0 jika penuh)" type="number" required="number">
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputStatus" class="col-sm-2 control-label">Hewan Peliharaan</label>

                  <div class="col-sm-10">
                    <select name="animal" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
	                  <option value="0" selected>Tidak Boleh</option>
	                  <option value="1">Boleh</option>
	                </select>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                	<label for="inputRoomFacility" class="col-sm-2 control-label">Fasilitas Kamar</label>

                	<div class="col-sm-10">
                		<select name="roomFacility" id="inputRoomFacility" class="form-control select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Pilih Fasilitas Kamar" style="width: 100%;" tabindex="-1" aria-hidden="true">
		                  <option value="Bed">Bed</option>
		                  <option value="Almari">Almari</option>
		                  <option value="Meja Belajar">Meja Belajar</option>
		                  <option value="Kursi Belajar"></option>
		                  <option value="TV">TV</option>
		                  <option value="AC">Ac</option>
		                  <option value="Wifi">Wifi</option>
		                  <option value="Dispenser">Dispense</option>
		                  <option value="Kulkas">Kulkas</option>
		                  <option value="Wastafel">Wastafel</option>
		                  <option value="Meja Cermin Rias">Meja Cermin Rias</option>
		                  <option value="Bisa Pasturi">Bisa Pasturi</option>
		                  <option value="Kipas Angin">Kipas Angin</option>
		                  <option value="Kamar Kosongan">Kamar Kosongan</option>
		                  <option value="Sekamar Berdua">Sekamar Berdua</option>
		                  <option value="Sekamar Bertiga">Sekamar Bertiga</option>
		                </select>
                	</div>
                </div>
            	<!-- form group -->
                <div class="form-group">
                  <label for="InputOtherRoomFacility" class="col-sm-2 control-label">Fasilitas Kamar Lainya</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" name="otherRoomFacility" value="{{ old('otherRoomFacility') }}" id="InputOtherRoomFacility" placeholder="(ex: Detail Fasilitas Lainya) *Maks 255 karakter" type="text"></textarea>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                	<label for="inputBathRoomFacility" class="col-sm-2 control-label">Fasilitas Kamar Mandi</label>

                	<div class="col-sm-10">
                		<select name="bathRoomFacility" id="inputBathRoomFacility" class="form-control select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Pilih Fasilitas Kamar" style="width: 100%;" tabindex="-1" aria-hidden="true">
                		<option value="Kamar Mandi Dalam">Kamar Mandi Dalam</option>
                		<option value="Kamar Mandi Luar">Kamar Mandi Luar</option>
                		<option value="Kloset Duduk">Kloset Duduk</option>
                		<option value="Kloset Jongkok">Kloset Jongkok</option>
                		<option value="Shower">Shower</option>
                		<option value="Bak Mandi">Bak Mandi</option>
                		<option value="Air Panas">Air Panas</option>
                		<option value="Bathub">Bathub</option>
                		<option value="Wastafel">Wastafel</option>
                		<option value="Ember Mandi">Ember Mandi</option>
		                </select>
                	</div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="InputOtherBathRoomFacility" class="col-sm-2 control-label">Fasilitas Kamar Mandi Lainya</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" name="otherBathRoomFacility" value="{{ old('otherBathRoomFacility') }}" id="InputOtherRoomFacility" placeholder="(ex: Detail Fasilitas Lainya) *Maks 255 karakter" type="text"></textarea>
                  </div>
                </div>
               <!-- form group -->
                <div class="form-group">
                	<label for="inputParking" class="col-sm-2 control-label">Parkir</label>

                	<div class="col-sm-10">
                		<select name="parking" class="form-control select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Pilih Fasilitas Kamar" style="width: 100%;" tabindex="-1" aria-hidden="true">
                		<option value="1">Mobil</option>
                		<option value="2">Motor</option>
                		<option value="3">Sepeda</option>
		                </select>
                	</div>
                </div>
                <!-- form group -->
                <div class="form-group">
                	<label for="inputGeneralFacility" class="col-sm-2 control-label">Fasilitas Umum Kost</label>

                	<div class="col-sm-10">
                		<select name="generalFacility" id="inputGeneralFacility" class="form-control select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Pilih Fasilitas Kamar" style="width: 100%;" tabindex="-1" aria-hidden="true">
                		<option value="Ruang Tamu">Ruang Tamu</option>
                		<option value="Ruang Makan">Ruang Makan</option>
                		<option value="Dapur">Dapur</option>
                		<option value="Kulkas">Kulkas</option>
                		<option value="Dispenser">Dispenser</option>
                		<option value="Mushola">Mushola</option>
                		<option value="Ruang Santai">Ruang Santai</option>
                		<option value="Ruang Jemuran">Ruang Jemuran</option>
                		<option value="Ruang Cuci">Ruang Cuci</option>
                		<option value="Mesin Cuci">Mesin Cuci</option>
                		<option value="Security">Security</option>
                		<option value="Akses 24 Jam">Akses 24 Jam</option>
		                </select>
                	</div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="InputOtherGeneralFacility" class="col-sm-2 control-label">Fasilitas Umum Lainya</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" name="otherGeneralFacility" value="{{ old('otherGeneralFacility') }}" id="InputOtherGeneralFacility" placeholder="(ex: Detail Fasilitas Lainya) *Maks 255 karakter" type="text"></textarea>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                	<label for="inputNearByFacility" class="col-sm-2 control-label">Akses Lingkungan</label>

                	<div class="col-sm-10">
                		<select name="nearByFacility" id="inputNearByFacility" class="form-control select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Pilih Fasilitas Kamar" style="width: 100%;" tabindex="-1" aria-hidden="true">
                		<option value="Rumah Makan">Rumah Makan</option>
                		<option value="Mini Market">Mini Market</option>
                		<option value="Laundry">Laundry</option>
                		<option value="ATM">ATM</option>
                		<option value="Apotik/Klinik">Apotik/Klinik</option>
                		<option value="Kampus/Sekolah">Kampus/Sekolah</option>
                		<option value="Halte Bus">Halte Bus</option>
                		<option value="Pusat Belanja/Mall">Pusat Belanja/Mall</option>
		                </select>
                	</div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="InputOtherNearByFacility" class="col-sm-2 control-label">Akses Lingkungan Lainya</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" name="otherNearByFacility" value="{{ old('otherNearByFacility') }}" id="InputOtherNearByFacility" placeholder="(ex: Detail Fasilitas Lainya) *Maks 255 karakter" type="text"></textarea>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="InputRemarks" class="col-sm-2 control-label">Catatan Lain</label>

                  <div class="col-sm-10">
                  <span class="text-info">Ada batasan jam kunjung atau tidak? / Harga sudah include listrik atau belum? / Ada biaya tambahan atau tidak untuk parkir mobil? / Ada cleaning room atau tidak? jika ada, ada tambahan biaya atau tidak? / Ada fasilitas laundry atau tidak? / Ada akses kunci 24 jam tidak? / Untuk wifi menggunakan voucher atau tidak? / Untuk fasilitas dapur sudah include tabung gas atau iuran?/ Tamu menginap ada tambahan biaya atau tidak?/ Pembayaran dilakukan setiap bulan atau 3 bulan sekali?/ DP minimal berapa?/ Ada fasilitas lain yang akan di promosikan atau tidak? </span>
                    <textarea class="form-control" name="remarks" value="{{ old('remarks') }}" id="InputRemarks" placeholder="*Maks 255 karakter" type="text"></textarea>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="InputDescriptions" class="col-sm-2 control-label">Deskripsi Kost</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" name="descriptions" value="{{ old('descriptions') }}" id="InputDescriptions" placeholder="*Maks 255 karakter" type="text"></textarea>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputNameAgent" class="col-sm-2 control-label">Nama Penginput</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="nameAgent" value="{{ old('nameAgent') }}" id="inputNameAgent" type="text" required="text" value="{{ Auth::user()->username }}">
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputEmailAgent" class="col-sm-2 control-label">Email Penginput</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="emailAgent" value="{{ old('emailAgent') }}" id="inputEmailAgent" type="text" required="text" value=" {{ Auth::user()->email }} ">
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputHpAgent" class="col-sm-2 control-label">No.Hp Penginput</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="hpAgent" value="{{ old('hpAgent') }}" id="inputHpAgent" placeholder="(ex: 08xxxxxxx)" type="text" required="text">
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputStatusAgent" class="col-sm-2 control-label">Status Penginput</label>

                  <div class="col-sm-10">
                    <select name="statusAgent" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
	                  <option value="0" selected>Agen</option>
	                 <option value="1">Pemilik Kost</option>
	                 <option value="2">Pengelola Kost</option>
	                 <option value="3">Anak Kost</option>
	                 <option value="4">Lainya</option>
	                </select>
                  </div>
                </div>
                <!-- Info Upload Photo -->
                <div class="col-sm-12">
                	<div class="callout callout-info text-left">
                		<h4><i class="icon fa fa-info"></i> Upload foto terbaik Anda, pastikan gambar tidak blur dan terlihat jelas.</h4>
		                <p>Upload Foto untuk informasi yang lebih relavan untuk calon pelanggan anda</p>
	              	</div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputCoverPhoto" class="col-sm-2 control-label">Foto Cover LANDSCAPE (Isi dengan foto bangunan)</label>

                  <div class="col-sm-10">
                    <input name="coverPhoto" id="inputCoverPhoto" type="file" required>
                  </div>
                  <!-- preview Photo -->
                  <div class="col-sm-12" id="previewCoverPhoto">
                  	<div class="col-sm-2"></div>
                  	<div class="col-sm-10">
                  		<div class="thumbnail">
                  			<img id="coverPhoto" src="#">
                  		</div>
                  	</div>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputBuildingPhoto" class="col-sm-2 control-label">Foto Bangunan LANDSCAPE</label>

                  <div class="col-sm-10">
                    <input name="buildingPhoto" id="inputBuildingPhoto" type="file" required>
                  </div>
                  <!-- preview Photo -->
                  <div class="col-sm-12" id="previewBuildingPhoto">
                  	<div class="col-sm-2"></div>
                  	<div class="col-sm-10">
                  		<div class="thumbnail">
                  			<img id="buildingPhoto" src="#">
                  		</div>
                  	</div>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputRoomFrontPhoto" class="col-sm-2 control-label">Foto Depan Kamar LANDSCAPE</label>

                  <div class="col-sm-10">
                    <input name="roomFrontPhoto" id="inputRoomFrontPhoto" type="file" required>
                  </div>
                  <!-- preview Photo -->
                  <div class="col-sm-12" id="previewRoomFrontPhoto">
                  	<div class="col-sm-2"></div>
                  	<div class="col-sm-10">
                  		<div class="thumbnail">
                  			<img id="roomFrontPhoto" src="#">
                  		</div>
                  	</div>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputRoomInsidePhoto" class="col-sm-2 control-label">Foto Dalam Kamar LANDSCAPE (Harus Full Shot, Kelihatan seluruh Isi kamar) </label>

                  <div class="col-sm-10">
                    <input name="roomInsidePhoto" id="inputRoomInsidePhoto" type="file" required>
                  </div>
                  <!-- preview Photo -->
                  <div class="col-sm-12">
                  	<div class="col-sm-2"></div>
                  	<div class="col-sm-10" id="previewRoomInsidePhoto">
                  		<div class="thumbnail">
                  			<img id="roomInsidePhoto" src="#">
                  		</div>
                  	</div>
                  </div>
                </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputToiletFrontPhoto" class="col-sm-2 control-label">Foto Depan Kamar Mandi LANDSCAPE</label>

                  <div class="col-sm-10">
                    <input name="toiletFrontPhoto" id="inputToiletFrontPhoto" type="file" required>
                  </div>
                  <!-- preview Photo -->
                  <div class="col-sm-12">
                  	<div class="col-sm-2"></div>
                  	<div class="col-sm-10" id="previewToiletFrontPhoto">
                  		<div class="thumbnail">
                  			<img id="toiletFrontPhoto" src="#">
                  		</div>
                  	</div>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputToiletInsidePhoto" class="col-sm-2 control-label">Foto Dalam Kamar Mandi LANDSCAPE</label>

                  <div class="col-sm-10">
                    <input name="toiletInsidePhoto" id="inputToiletInsidePhoto" type="file" required>
                  </div>
                  <!-- preview Photo -->
                  <div class="col-sm-12" id="previewToiletInsidePhoto">
                  	<div class="col-sm-2"></div>
                  	<div class="col-sm-10">
                  		<div class="thumbnail">
                  			<img id="toiletInsidePhoto" src="#">
                  		</div>
                  	</div>
                  </div>
                </div>
                <!-- form group -->
                <div class="form-group">
                  <label for="inputOtherFacilityPhoto" class="col-sm-2 control-label">Foto Fasilitas Lain LANDSCAPE</label>
                  <span class="text-success">*jika ada</span>

                  <div class="col-sm-10">
                    <input name="otherFacilityPhoto" id="inputOtherFacilityPhoto" type="file">
                  </div>
                  <!-- preview Photo -->
                  <div class="col-sm-12" id="previewOtherFacilityPhoto">
                  	<div class="col-sm-2"></div>
                  	<div class="col-sm-10">
                  		<div class="thumbnail">
                  			<img id="otherFacilityPhoto" src="#">
                  		</div>
                  	</div>
                  </div>
                </div>
               </div><!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default col-sm-5">Cancel</button>
                <button type="submit" id="save" class="btn btn-info pull-right col-sm-5">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
	</div>
</div>
@endsection

@section('script')
	@include('kost.photo-preview-script')
	<!-- jquery-gmaps-latlon-picker.js deteksi lokasi dengan navigator-->
  @include('kost.auto-detect-location')
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVHgvRIsfyRFZncJe1GDq5c9oOBtyVa6s"></script>
@endsection

@section('sweetAlert')
	<script>
	$("button[type=reset]").click(function(){
		swal({
		  title: "Apakah Anda Yakin?",
		  text: "Semua filed pada form akan di hapus & anda harus mengisi ulang form!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Ya, Hapus!",
		  closeOnConfirm: false
		},
		function(){
		  swal("Terhapus!", "Entry Data Anda Telah Dibatalkan.", "success");
		  $(":input").val("");
		  $('div[id*="preview"]').slideUp(300).delay(800);
		});
	});
	</script>
@endsection

@section('pluginsCss')
	<link href="{!! asset('assets/css/jquery-gmaps-latlon-picker.css') !!}" rel="stylesheet">
	<link href="{!! asset('assets/css/plugins/sweetalert.css') !!}" rel="stylesheet">
@endsection