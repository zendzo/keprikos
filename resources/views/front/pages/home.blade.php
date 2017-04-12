@extends('layouts.front')

@section('content')
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Selamat Datang di KepriKost</h1>
                <hr>
				@include('notifications.status_message')
				@include('notifications.errors_message')
                <p>KepriKost Adalah layanan aplikasi data kost yang menyediakan fasilitas untuk para penyedia rumah kost dan para pelanggan khusunya di daerah kepulauan Riau, Untuk memposting informasi kost anda, silahkan daftar atau login jika sudah terdaftar</p>
                <a href="{{ url('/login') }}" class="btn btn-primary btn-xl page-scroll">Login</a>  <a href="{{ url('/register') }}" class="btn btn-danger btn-xl page-scroll">Register</a>
            </div>
        </div>
    </header>

	<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">KepriKost Membantu para pemilik kost dan pelangggan</h2>
                    <hr class="primary">
                    <p>Ready to start learning how to do custom authorization with Laravel 5.3? Then start with this demo! You can either login to your account to view the administrator dashboard or you can register to get an activation link sent to your email address! And you can find the</p>
                </div>
                <div class="col-lg-12 text-center">
                    <a href="{{ url('/login') }}" class="btn btn-primary btn-xl page-scroll"><i class="fa fa-user sr-contact"></i> Login</a>
					<a href="{{ url('/register') }}" class="btn btn-danger btn-xl page-scroll"><i class="fa fa-user-plus  sr-contact"></i> Register</a>
                </div>
            </div>
        </div>
    </section>

	<section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Langkah cepat menggunakan sistem kami.</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-user-plus text-primary sr-icons"></i>
                        <h3>Login untuk semua kemudahan beriklan!</h3>
                        <p class="text-muted">isi teks.</p>
						<a href="{{ url('/register') }}" >Login Sekarang!</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-exchange text-primary sr-icons"></i>
                        <h3>Aktivasi dengan token, Lebih aman!</h3>
                        <p class="text-muted">teks aktivasi.</p>
						<a href="{{ url('/register') }}">Daftar Sekarang!</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-address-card text-primary sr-icons"></i>
                        <h3>Reset password lebih mudah dan aman!</h3>
                        <p class="text-muted">Teks Lupa.</p>
						<a href="{{ url('/password/reset') }}" >Lupa password anda?</a> atau 
						<a href="{{ url('/username/reminder') }}" >Lupa username anda? </a> atau 
                        <a href="{{ url('/activation/resend') }}" >Kirim ulang kode aktivasi?</a>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-edit text-primary sr-icons"></i>
                        <h3>Beriklan sekarang juga dan tingkatkan omset anda!</h3>
                        <p class="text-muted">Teks Iklan</p>
						<a href="{{ url('/kost-create') }}" ></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Mulai dengan KepriKost untuk semua kebutuhan kost anda!</h2>
				<p>kami berusaha dengan sepenuh hati untuk menyediakan fasilitas yang membantu kebutuhan anda dalam mencari kost idaman, akses sekarang juga!</p>
                <a href="{{ url('/kost-list') }}" target="_blank" class="btn btn-success btn-xl sr-button"><i class="fa fa-list "></i> Pilih Kost</a>
				<a href="{{ url('/kost-search') }}" target="_blank" class="btn btn-primary btn-xl sr-button"><i class="fa fa-search "></i> Cari Kost</a>
            </div>
        </div>
    </aside>
@endsection