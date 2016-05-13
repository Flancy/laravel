<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <link href="{{ url('libs/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/main.css') }}" rel="stylesheet">

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
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if (Auth::guest())

                @else
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}">Главная</a></li>
                        @can('admin')
                            <li><a href="{{ url('/admin') }}">Админка</a></li>
                        @endcan
                    </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())

                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span>
                                    {{ $leadInfo->fio or $companyInfo->fio }}
                                </span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if (isset($debit))
                                    <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i> Баланс: {{ $debit }} р.</a></li>
                                @endif
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Выйти</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="{{ url('libs/jquery/jquery-1.12.3.min.js') }}"></script>
    <script src="{{ url('libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/common.js') }}"></script>
</body>
</html>
