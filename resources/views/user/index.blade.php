<html>
	<head>
		<title>IQRA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="/assets/css/main.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<div class="logo"><a href="/">IQRA <span>by nazim</span></a></div>
				<a href="#one">books</a>
				<a href="#fil">filtré</a>
				<a href="/UserLogin">log in</a>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li style="text-align: center;"><a href="#"><img src="images/pic02.jpg" style="border-radius: 50%;" alt="" width="150px" height="150px" /></a>
						<h5>ouail nazim</h5>
					</li>
					<br>
					<li><a href="/UserLogin">log in</a></li>
					<li><a href="/about">About</a></li>
				</ul>
			</nav>

		<!-- Banner -->
			<section class="banner full">
				<article>
					<img src="images/bg.jpg" alt="" />
					<div class="inner">
						<header>
							<p>Get your book now and for free <a href="#">here</a></p>
							<h2>IQRA</h2>
							<h5>spreading knowledge</h5>
							<form action="/getlivre" method="Get">
								<input type="text" name="serch" placeholder="serch for book" maxlength="20" required>
							<button type="submit" name="" id="bt_ser">
								<strong id="tet"> go</strong>
							</button>
							</form>
						</header>
					</div>
				</article>
			</section>
		{{--filtre--}}
		<section id="fil" class="mb-1 " style="width: 100%;padding-left: 5%;padding-right: 5%;padding-top: 5%">
			<form class=" row" action="/filtre" method="get">
				<div class="col-md-5">
					<div class=" row">
						<div class="col-md-3"><label for="inputState" >Type >></label></div>
						<div class="col-md-6">
							<select id="inputState" name="type" class="form-control w-100">
								<option  value="all">ALL</option>
								<option value="livre">Livre</option>
								<option  value="memoire">mémoire</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class=" row">
						<div class="col-md-3">
							<label for="inputState">Categorie >> </label>
						</div>
						<div class="col-md-6">
							<select id="inputState"  name="cat" class="form-control">
								<option  value="{{0}}">ALL</option>
								@foreach($cat as $categori)
									<option  value="{{$categori->id}}">{{$categori->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<input type="submit" name=""  class="form-control  bg-dark text-info " value="filtré">

				</div>
			</form>


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
										<p>livre</p>
										<h6 class="card-title">ISBN : {{$doccument->livre->isbn}} </h6>
									@else
										<p>mémoire</p>
										<h6 class="card-title">promotion : {{$doccument->memoire->promotion}} </h6>
										@endif
										</p>

								</div>
							</div>
							<footer class="align-center">
								<a href="#" class="btn w-75 btn-secondary text-light text-bold ">Réserver</a>
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
					Copyright &copy; 2020-2021 .All rights reserved.by nazim
				</div>
			</footer>
		<!-- Scripts -->
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