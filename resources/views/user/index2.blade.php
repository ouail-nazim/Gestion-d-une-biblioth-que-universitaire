<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/button.css') }}" rel="stylesheet">

</head>

<body>
<div class="toggle"></div>
<div class="overly"></div>
<div class="menu">
    <ul>
        @foreach($abonner as $abo)
        <li><a href="ho?num={{$abo->num}}&nom={{$abo->nom}}"><i class="text-white fa fa-home "></i>home</a></li>
        <li><a href="#">about</a></li>
        <li><a href="#">services</a></li>
        <li><a href="#">team</a></li>
        <li><a href="#">portfolio</a></li>
        <li><a href="#">contact</a></li>
        @endforeach

    </ul>
    <div class="profile">
        <div class="content-profile">
            @if (count($abonner) == 0)
                <div class="contact-form">
                    <img src="2.jpg" class="avatar">
                    <h2>Contact Form</h2>
                    <form  autocomplete="off" action="/ho" method="get">
                        <p>Numéro</p>
                        <input type="text" name="num"  placeholder="Enter your id">
                        <p>name</p>
                        <input type="text" name="nom" placeholder="Enter your name">
                        <input type="submit"  value="Sign In">
                        <div class="link">
                            <span class="not">Not a member?</span>
                            <a href="#" >creé un compte now</a>
                        </div>
                    </form>

                </div>

            @else
                @foreach($abonner as $abo)


                @endforeach
            @endif


        </div>
    </div>

</div>


    @if (count($abonner) == 0)
        <nav class="navbar navbar-expand-lg navbar-light bg-light">


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <img src="logo.png" width="40px" class="mr-3 rounded-circle img-thumbnail ">
                <div class="media-body">
                    <a class="font-weight-bold font-italic text-decoration-none text-dark " href="#"><h4 class="m-0">{{ "Bibliothèque Manager"}}</h4></a>
                </div>
                <form class="form-inline  w-50 my-2 my-lg-0">
                    <input class="form-control mr-sm-2 w-50" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                </form>



                <ul class="navbar-nav in">
                    <li class="nav-item ">
                        <a class="nav-link active" href="/"><i class="fa fa-sign-in"></i> Login </a>
                    </li>
                </ul>

            </div>
        </nav>

    @else
        @foreach($abonner as $abo)
            <nav class="navbar navbar-expand-lg navbar-light bg-light">


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <img src="logo.png" width="40px" class="mr-3 rounded-circle img-thumbnail ">
                    <div class="media-body">
                        <a class="font-weight-bold font-italic text-decoration-none text-dark " href="#"><h4 class="m-0">{{ "Bibliothèque Manager"}}</h4></a>
                    </div>
                    <form class="form-inline  w-50 my-2 my-lg-0">
                        <input class="form-control mr-sm-2 w-50" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                    </form>



                    <ul class="navbar-nav in">
                        <li class="nav-item ">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$abo->nom}}<i class="fa fa-bars ml-2"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="#"><i class="fa fa-home mr-2"></i> See Profile</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-tachometer mr-2"></i> point</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/"><i class="fa fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>



                    </ul>

                </div>
            </nav>

        @endforeach
    @endif

<div class="con">
    <div class="col">
        <div class="row row-cols-4">
            @foreach($livres as $liv)
                <div class="col">
                    <div class="card cc" style="width: 18rem; height: auto;">
                        <img src="{{$liv->img}}"  height="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Name livre :{{$liv->name}}</h5>
                            <h6 class="card-title">R : {{$liv->id}}</h6>
                            <br>
                            @if (count($abonner) != 0)
                                <a href="#" class="btn btn-primary mr-4">Réserver</a>
                                <a href="#" class="btn btn-primary ml-5">Detaile</a>
                            @else
                                <a href="#" class="btn btn-primary ">Detaile</a>
                            @endif
                        </div>
                    </div></div>
            @endforeach
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<!-- kima tataka 3la el toggle yrodlak el class active -->
<script type="text/javascript">
    $(document).ready(function () {
        $('.toggle').click(function(){
            $('.toggle').toggleClass('active')
            $('.overly').toggleClass('active')
            $('.menu').toggleClass('active')
            $('.con').toggleClass('active')
        })
    })
</script>
</body>
</html>