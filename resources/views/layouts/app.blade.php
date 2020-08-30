<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-TileImage" content="/2.jpg">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>IQRA</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="shortcut icon" href="/images/univ.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


</head>
<body >
    <div id="app" >
        @guest
        @else
            <nav class="navbar navbar-expand-md navbar-light ha shadow-sm haut">
                <div class="container ">
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto ">
                            <form  action="{{url("/searchAbonner")}}" method="get" class="form-inline" role="search">
                                <label for="search1" class="fa fa-user-large mr-3 text-light fa-user"></label>
                                <input class="form-control searchaa w-90 " type="text" id="search1" name="search" maxlength="20"  required  placeholder="Rechercher un abonné" aria-label="Search">
                                {{--<button class="btn btn--success " type="submit">Go</button>--}}
                                <button class="btn text-light searchaa" type="submit"><i class="fa fa-search-large mr-1 text-outline-light fa-search"></i> </button>

                            </form>
                            <span class="mr-4"></span>
                            <form  action="{{url("/searchdoc")}}" method="get" class="form-inline" role="search">
                                <label for="search2" class="fa fa-book-large mr-3 text-light fa-book"></label>
                                <input class="form-control searchaa w-90 " type="text" id="search2" name="search" maxlength="20" required placeholder="Rechercher sur un document" aria-label="Search">
                                <button class="btn text-light searchaa " type="submit"><i class="fa fa-search-large mr-1 text-outline-light fa-search"></i> </button>

                            </form>

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">

                                <li class="nav-item dropdown">

                                    <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa fa-user-large mr-1 text-light fa-user"></i>
                                        <span class="text-light">{{"Admin" }}</span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">
                                            <i class="fa fa-pencil-large mr-3 text-dark fa fa-pencil"></i>
                                            settings

                                        </a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa mr-3 text-dark fa-sign-out"></i> Logout
                                        </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>

                                </li>



                        </ul>
                    </div>
                </div>
            </nav>

            @endguest

        <main class="py-4 ">
            @yield('content')
        </main>
    </div>
    <script src="http://unpkg.com/turbolinks"></script>
</body>
</html>
