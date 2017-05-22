@extends('layouts.app')

@section('pluginsCss')
<style>
    .city{
    -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
    filter: grayscale(100%);
    }
    .city:hover{
        -webkit-filter: grayscale(0%); /* Safari 6.0 - 9.0 */
        filter: grayscale(0%);
    }
</style>
@endsection

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
                    <img class="img-rounded img-responsive city" src="{{ asset("assets/img/categories/anambas-color.jpg") }}" height="230px" width="210px">
                </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                <a href="{{ url("kost-search?keyword=anambas") }}">
                    <img class="img-rounded img-responsive city" src="{{ asset("assets/img/categories/batam-color.png") }}" height="230px" width="210px">
                </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                <a href="{{ url("kost-search?keyword=batam") }}">
                    <img class="img-rounded img-responsive city" src="{{ asset("assets/img/categories/bintan-color.png") }}"  height="230px" width="210px">
                </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                <a href="{{ url("kost-search?keyword=bintan") }}">
                    <img class="img-rounded img-responsive city" src="{{ asset("assets/img/categories/karimun-color.png") }}"  height="230px" width="210px">
                </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                <a href="{{ url("kost-search?keyword=karimun") }}">
                    <img class="img-rounded img-responsive city" src="{{ asset("assets/img/categories/lingga-color.png") }}"  height="230px" width="210px">
                </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                    <a href="{{ url("kost-search?keyword=lingga") }}">
                        <img class="img-rounded img-responsive city" src="{{ asset("assets/img/categories/natuna-color.png") }}"  height="230px" width="210px">
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                <a href="{{ url("kost-search?keyword=tanjungpinang") }}">
                        <img class="img-rounded img-responsive city" src="{{ asset("assets/img/categories/tanjungpinang-color.png") }}"  height="230px" width="210px">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection