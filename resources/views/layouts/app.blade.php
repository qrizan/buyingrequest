<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','Buying Request')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}"> 

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">
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
                    Customer Request
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::guest())                    
                        <li><a href="{{ url('/buyingrequest') }}">Buying Request</a></li>
                    @else
                        @if(Auth::user()->role != 'seller')
                            <li><a href="{{ url('/buyingrequest') }}">Buying Request</a></li>                    
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Permintaan <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/all-request') }}">Permintaan Belum Direspon</a></li>
                                <li><a href="{{ url('/all-report-request') }}">Permintaan Ditolak</a></li>
                                <li><a href="{{ url('/all-respond-request') }}">Permintaan Direspon</a></li>
                                <li><a href="{{ url('/all-respond-approved') }}">Permintaan Disetujui</a></li>
                            </ul>                            
                        </li>    

                        @if(Auth::user()->role == 'seller')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Penawaran <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/all-request-approved') }}">Penawaran Diterima</a></li>
                            </ul>
                        </li>    
                        @endif                                                                                        
                    @endif                    
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->email }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
        @if(Session::has('msg'))
          <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
        @endif
            @yield('content')
        </div>
    </div>
    

    <!-- JavaScripts -->
    <script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>    
    <script src="{{ asset('assets/js/base.js') }}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
