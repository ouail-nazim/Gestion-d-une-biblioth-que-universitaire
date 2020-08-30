<html>
	<head>
		<title>IQRA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="/images/univ.png" type="image/x-icon"/>
		<link rel="stylesheet" href="/assets/css/main.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<style>
		.costum,.costum a{
			background: #9fc1f0;
			background: -webkit-linear-gradient(to right, #dddddd, #aaaaaa);
			background: linear-gradient(to right, #dddddd, #aaaaaa);
			font-size: medium;
			height: auto;
			color: black;
			font-family: "Lucida Console", monospace, sans-serif;
			font-weight: bold;
		}
	</style>
	<body>

	<!-- Header -->
			<header id="header" class="alt">
				<div class="logo"><a href="/">IQRA <span>spreading knowledge</span></a></div>
				<a href="#one">Mes Document</a>
				<a href="#fil">Filtrer</a>
					@auth()

					<a href="/logoutuser">Déconnecter</a>
					@else
						<a href="/UserLogin">Se connecter</a>
					@endauth
					<a href="#menu">Menu</a>

			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					@auth()
					<li style="text-align: center;">
								<img src="/images/univ.png" style="border-radius: 50%;" alt="" width="150px" height="150px" >
						<br>
						<h5 style="color: white;">{{ Auth::guard('abonner')->user()->nom}}_{{Auth::guard('abonner')->user()->prenom}} </h5>
						<h5 style="color: white;">{{ Auth::guard('abonner')->user()->email}} </h5>
					</li>
					<br>
					<li><a href="profile/{{ Auth::guard('abonner')->user()->id}}">Mon profil</a></li>
					<li><a href="/logoutuser">Déconnecter</a></li>
					@else
						<li><a href="/UserLogin">Connecter</a></li>
						@endauth

					<li><a href="/about">About</a></li>
				</ul>
			</nav>

		<!-- Banner -->
			<section class="banner full">
				<article>
					<img src="images/bg.jpg" alt="" />
					<div class="inner">
						<header>
							<p>Réservez votre document maintenant et gratuitement ici<a href="#one"> ici</a></p>
							<h2>IQRA</h2>
							<h5>spreading knowledge</h5>
							@auth()
							<form action="/USERgetlivre" method="Get">
								<div class="input-group mb-3">
									<input type="text" class="form-control" name="serch" placeholder="Rechercher un Document" maxlength="20" required aria-label="Recipient's username" aria-describedby="basic-addon2">
									<div class="input-group-append">
										<button class="btn btn-secondary text-light" type="submit">
											<i class="fa fa-search text-outline-light "></i>
										</button>
									</div>
								</div>
							</form>
							@else
								<form action="/getlivre" method="Get">
									<div class="input-group mb-3">
										<input type="text" class="form-control" name="serch" placeholder="Rechercher un Document" maxlength="20" required aria-label="Recipient's username" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-secondary text-light" type="submit">
												<i class="fa fa-search text-outline-light "></i>
											</button>
										</div>
									</div>
								</form>
								@endauth


						</header>
					</div>
				</article>
			</section>
		{{--filtre--}}
		<section id="fil" class="mb-1 " style="width: 100%;padding-left: 5%;padding-right: 5%;padding-top: 5%">


			@auth()
				<form class=" row" action="/USERfiltre" method="get">
				<div class="col-md-5">
					<div class=" row">
						<div class="col-md-2"><label for="inputState" style="font-size: 1em;font-family: 'Courier New', 'monospace'" >Type :</label></div>
						<div class="col-md-10">
							<select id="inputState" name="type" class="form-control w-100">
								<option  value="all">Tout les Documents</option>
								<option value="livre">Livre</option>
								<option  value="memoire">mémoire</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class=" row">
						<div class="col-md-3">
							<label for="inputState" style="font-size: 16px;font-family: 'Courier New', 'monospace'">Catégorie:</label>
						</div>
						<div class="col-md-9">
							<select id="inputState"  name="cat" class="form-control">
								<option  value="{{0}}">TOUT</option>
								@foreach($cat as $categori)
									<option  value="{{$categori->id}}">{{$categori->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<input type="submit" name=""  class="form-control  btn costum " value="Filtrer">

				</div>
			</form>
			@else
				<form class=" row" action="/filtre" method="get">
					<div class="col-md-5">
						<div class=" row">
							<div class="col-md-2"><label for="inputState" style="font-size: 1em;font-family: 'Courier New', 'monospace'" >Type :</label></div>
							<div class="col-md-10">
								<select id="inputState" name="type" class="form-control w-100">
									<option  value="all">Tout les Documents</option>
									<option value="livre">Livre</option>
									<option  value="memoire">mémoire</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class=" row">
							<div class="col-md-3">
								<label for="inputState" style="font-size: 16px;font-family: 'Courier New', 'monospace'">Categorie:</label>
							</div>
							<div class="col-md-9">
								<select id="inputState"  name="cat" class="form-control">
									<option  value="{{0}}">TOUT</option>
									@foreach($cat as $categori)
										<option  value="{{$categori->id}}">{{$categori->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<input type="submit" name=""  class="form-control  costum " value="filtré">

					</div>
				</form>
				@endauth

		</section>
		<!-- body -->
			<section id="one" class="wrapper style2">
				<div class="content1">
					@foreach($doc as $doccument)
					<div class="box1"><div class="box">
							<div class="image fit">
								<img src="{{'/storage/books/'.$doccument->img}}"  height="120px" class="card-img-top" alt="...">
							</div>
							<div class="content">

								<header class="align-center">
									<p>Code : "{{$doccument->code}}"</p>
									<h2>{{$doccument->titre}}</h2>
								</header>
								<div >
									<p>@if(($doccument->livre)!= null)
										<p>type : livre</p>
										<h6 class="card-title">ISBN : {{$doccument->livre->isbn}} </h6>
									@else
										<p>type : mémoire</p>
										<h6 class="card-title">promotion : {{$doccument->memoire->promotion}} </h6>
										@endif
										</p>

								</div>
							</div>
							<footer class="align-center">
								@auth()
									@if((count($abonner->reservation))==0)
										<a href="/reserve_livre/{{$doccument->code}}" class="btn w-75 costum ">Réserver</a>
									@else
										<span class="text-danger  text-bold"> vous aver réserver un livre</span>
									@endif
								@else
									<span class="text-danger text-bold"> pour réserver un livre vous devez etre identifié </span>
									<br>
									@endauth

							</footer>

						</div></div>
					@endforeach

				</div>
			</section>
		<!-- Footer -->
			<footer id="footer">

				<div class="container">
					<ul class="icons">
						<li><a href="https://github.com/ouail-nazim" class="icon fa fa-github"><span class="label">GitHub</span></a></li>
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="https://www.facebook.com/profile.php?id=100041906624052" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>

					</ul>
				</div>
				<div class="copyright">
					Copyright &copy; 2020-2021 .Tous les droits sont réservés. Pour "IQRA_spreading knowledge"
				</div>
			</footer>
		<!-- Scripts -->
    <script src="http://unpkg.com/turbolinks"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	</body>
</html>
