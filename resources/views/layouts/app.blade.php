<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{!! asset('assets/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/css/font-awesome.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/css/select2.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/css/keprikost.custom.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/css/AdminLTE.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/css/plugins/sweetalert.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/easy-autocomplete.css') }}">

    @yield('pluginsCss')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'KepriKost') }}
                    </a>
                    <!-- search kost navbar-form -->
                    <form action="{{ route('kost.search') }}" class="navbar-form navbar-left easy-autocomplete eac-round" role="search">
                      <div class="form-group">
                        <input name="keyword" type="text" class="form-control" id="search-kost" placeholder="Cari" style="width: 300px;">
                      </div>
                      <button type="submit" class="btn btn-info" id="search-kost-button">
                        <i class="fa fa-search" aria-hidden="true"></i> Cari</button>
                    </form>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-cogs" aria-hidden="true"></i>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/user.dashboard') }}"><i class="fa fa-user-circle" aria-hidden="true"></i> User Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('kost-create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Promosi Kost</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i> My Kost</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-bed" aria-hidden="true"></i> My Order</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

       <div class="container">
       <div class="row">
        @include('notifications.status_message')
        @include('notifications.errors_message')
       </div>
            @yield('content')
       </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{!! asset('assets/js/jquery-2.1.1.min.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery-gmaps-latlon-picker.js') !!}"></script>
    <script src="{!! asset('assets/js/select2.js') !!}"></script>
    <script src="{!! asset('assets/js/plugins/sweetalert/sweetalert.min.js') !!}"></script>
    <!-- Scripts -->
    <script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
    <script src="{{ asset('assets/js/jquery.easy-autocomplete.js') }}"></script>
    <script type="text/javascript">
      $('.select2').select2();
    </script>
    @yield('sweetAlert')
    @include('notifications.sweetalert')
    @include('kost.easy-autocomplete')
    @yield('script')
    <!-- if search text field empty -->
    <script>
        $("form.navbar-form").submit(function(){
            if (!$("input[name=keyword]").val()) {
               $(".form-group:has(input[name=keyword])").addClass("has-error");
               swal("","Lengkapi keyword pencarian dengan nama kost","info");
               return false;
            }
        });
    </script>
</body>
</html>
