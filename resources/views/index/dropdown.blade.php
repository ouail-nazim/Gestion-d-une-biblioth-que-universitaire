<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="">
<link rel="stylesheet" type="text/css" href="">

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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/index_style/sidebarcss.css') }}" rel="stylesheet">
    @yield('head')

</head>
<body>

<div class="navbar">
    <div class="navbar-nav  ">
        <div class="row">
            <div class=" w-40">
                <form  action="{{url("/searchAbonner")}}" method="get" class="form-inline" role="search">
                    <label for="search1" class="fa fa-user-large  mr-3 text-dark fa-user"></label>
                    <input class="form-control searchaa w-90 " type="text" id="search1" name="search" maxlength="20"  required  placeholder="Rechercher un abonné ..." aria-label="Search">
                    {{--<button class="btn btn--success " type="submit">Go</button>--}}
                    <button class="btn text-dark searchaa" type="submit"><i class="fa fa-search-large mr-1 text-outline-light fa-search"></i> </button>

                </form>
            </div>
            <div class="col w-50">
                <form  action="{{url("/searchdoc")}}" method="get" class="form-inline" role="search">
                    <label for="search1" class="fa fa-book mr-3 text-dark "></label>
                    <input class="form-control searchaa w-90 " type="text" id="search1" name="search" maxlength="20"  required  placeholder="Recherche un Document ..." aria-label="Search">
                    {{--<button class="btn btn--success " type="submit">Go</button>--}}
                    <button class="btn text-dark searchaa" type="submit"><i class="fa fa-search-large mr-1 text-outline-light fa-search"></i> </button>

                </form>

            </div>
        </div>
    </div>
    <div class="navbar-nav ml-auto ">
        <div class="row mr-3">
            <a href="/getpenliser"><i class="fa fa-bell  ml-1"></i></i><span class="badge badge1 badge-danger">@if((Config::get('retarde'))!=0){{Config::get('retarde')}} @endif</span></a>
            <a href="/liste_reservation"><i class="fa fa-calendar  ml-1"></i></i><span class="badge badge1 badge-danger">@if((Config::get('death'))!=0){{Config::get('death')}} @endif</span></a>
            <a href="#1"><i class="fa fa-envelope  ml-1"></i><span class="badge badge1 badge-danger">9</span></a>
        </div>

    </div>
</div>


<div class="sidenav">
    <a href="/home" class="llogo"><img src="/images/logo5.png" width="100%" class="mb-2 "></a>
    <button class="dropdown-btn1 ">
        <i class="fa fa-cogs mr-1"></i>
        <span class="">{{ Auth::guard('web')->user()->name}}</span>
    </button>
    <div class="dropdown-container">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
            <i class="fa mr-3 text-dark fa-sign-out"></i> Déconnecter
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <a href="/home"><i class="fa fa-home-large mr-3 fa fa-home "></i>Accueil</a>
    <a href="/indexdoc"><i class="fa fa-home-large mr-3 fa fa-book "></i>Document</a>
    <a href="/See_all" ><i class="fa fa-user-large mr-3 fa fa-user "></i>Abonné</a>
    <button class="dropdown-btn"><i class="fa fa-caret-down mr-5"></i>Gérer Abonnés</button>
    <div class="dropdown-container">
      <li class="nav-item ">
          <a href="/addAbonner" class="nav-link font-italic ">
              <i class="fa fa-plus-large mr-1 fa-plus"></i>
              Ajouter un abonné
          </a>
      </li>
      <li class="nav-item ">
          <a href="/gotoeditAbonner" class="nav-link font-italic ">
              <i class="fa fa-pencil-large mr-1 fa fa-pencil"></i>
              Modifier abonné
          </a>
      </li>
      <li class="nav-item ">
          <a href="/gotodeletAbonner" class="nav-link font-italic ">
              <i class="fa fa-bitbucket-large mr-1 fa fa-bitbucket"></i>
              Suprimer un abonné
          </a>
      </li>
      {{--<li class="nav-item ">--}}
          {{--<a href="/gotopinaliserAbonner" class="nav-link font-italic ">--}}
              {{--<i class="fa fa-minus-circle-large mr-1 fa fa-minus-circle"></i>--}}
              {{--pinaliser un abonner--}}
          {{--</a>--}}
      {{--</li>--}}
      {{--<li class="nav-item ">--}}
          {{--<a href="/gotoprivligerAbonner" class="nav-link font-italic ">--}}
              {{--<i class="fa fa-star-large mr-1 fa fa-star"></i>--}}
              {{--privliger un abonner--}}
          {{--</a>--}}
      {{--</li>--}}
  </div>
    <button class="dropdown-btn"><i class="fa fa-caret-down mr-5"></i>Gérer documents</button>
    <div class="dropdown-container">
      <li class="nav-item ">
          <a href="/create" class="nav-link  font-italic ">
              <i class="fa fa-plus-large mr-1 fa-plus"></i>
              Ajouter un Document
          </a>
      </li>
      <li class="nav-item ">
          <a href="/create?action=suprimer" class="nav-link font-italic ">
              <i class="fa fa-bitbucket-large mr-1 fa-bitbucket"></i>
              Suprimer un Document
          </a>
      </li>
      <li class="nav-item ">
          <a href="/create?action=edit" class="nav-link font-italic ">
              <i class="fa fa-pencil-large mr-1 fa-pencil"></i>
              Modifier un Document
          </a>
      </li>
  </div>
    <button class="dropdown-btn"><i class="fa fa-caret-down mr-5"></i>Gérer prêts</button>
    <div class="dropdown-container">
        <li class="nav-item ">
            <a href="/creatadd" class="nav-link  font-italic ">
                <i class="fa fa-plus-large mr-1 fa-plus"></i>
                Nouveau prêt
            </a>
        </li>
        <li class="nav-item ">
            <a href="/creatback" class="nav-link font-italic ">
                <i class="fa fa-reply-large mr-1 fa-reply"></i>
                Retourner le document
            </a>
        </li>

    </div>
    <a href="/Catégori"><i class="fa fa-tags-large mr-1 fa-tags"></i>Catégori</a>
    <a href="/about"><i class="fa fa-info-circle-large mr-1 fa-info-circle"></i> À propos de nous</a>
</div>

<div class=" p-2 flex-grow-1 bd-highlight content1">
    @yield('content1')
    {{--<div style="height: 25px;"></div>--}}
    {{--<div class="footer">--}}
        {{--<strong>Copyright &copy; 2020-2021 .All rights reserved.by nazim </strong>--}}
    {{--</div>--}}
</div>
</div>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
var dropdown1 = document.getElementsByClassName("dropdown-btn1");
var i;

for (i = 0; i < dropdown1.length; i++) {
    dropdown1[i].addEventListener("click", function() {
        this.classList.toggle("btnactive");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}

</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
