@extends('layouts.app')

@section('content')
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Selamat Datang di KepriKost</h1>
                <p>KepriKost Adalah layanan aplikasi data kost yang menyediakan fasilitas untuk para penyedia rumah kost dan para pelanggan khusunya di daerah kepulauan Riau, Untuk memposting informasi kost anda, silahkan daftar atau login jika sudah terdaftar</p>
                <hr/>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                <a href="{{ url("kost-search?keyword=anambas") }}">
                    <img class="img-rounded img-responsive" src="{{ asset("assets/img/categories/anambas.jpg") }}" height="230px" width="210px">
                </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                <a href="{{ url("kost-search?keyword=batam") }}">
                    <img class="img-rounded img-responsive" src="{{ asset("assets/img/categories/batam.png") }}"  height="230px" width="210px">
                </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                <a href="{{ url("kost-search?keyword=bintan") }}">
                    <img class="img-rounded img-responsive" src="{{ asset("assets/img/categories/bintan.png") }}"  height="230px" width="210px">
                </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                <a href="{{ url("kost-search?keyword=karimun") }}">
                    <img class="img-rounded img-responsive" src="{{ asset("assets/img/categories/karimun.gif") }}"  height="230px" width="210px">
                </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                    <a href="{{ url("kost-search?keyword=lingga") }}">
                        <img class="img-rounded img-responsive" src="{{ asset("assets/img/categories/lingga.png") }}"  height="230px" width="210px">
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                <a href="{{ url("kost-search?keyword=anambas") }}">
                        <img class="img-rounded img-responsive" src="{{ asset("assets/img/categories/anambas.jpg") }}"  height="230px" width="210px">
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                <a href="{{ url("kost-search?keyword=natuna") }}">
                        <img class="img-rounded img-responsive" src="{{ asset("assets/img/categories/natuna.png") }}"  height="230px" width="210px">
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                <a href="{{ url("kost-search?keyword=tanjungpinang") }}">
                        <img class="img-rounded img-responsive" src="{{ asset("assets/img/categories/tanjungpinang.png") }}"  height="230px" width="210px">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection