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
    <title>{{ 'I Q R A ' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            width: 100vw;
            height: 100vh;
            margin: 0;
            padding: 2% 30% 2% 30%;
            background-image: url("/images/bg.jpg");
            -webkit-background-image: url("/images/bg.jpg");
            background-position: top;
            background-size: cover;

        }


        .content2{
            border-radius: 5%;
            padding-top: 3%;
            padding-left: 30%;
            padding-bottom: 2%;
            background: white;
            width: 100%;
            height: auto;
            box-shadow: #b9b9b9 -3PX -3PX 20PX 3PX  ;
            font-size:14px ;

        }
        .modal {
            display: none; /* Hidden by default */
            z-index: 1; /* Sit on top */
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 27%; /* Could be more or less, depending on screen size */
        }
        .modal-content1 {
            background-color: #fefefe;
            margin: 10% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 90%; /* Could be more or less, depending on screen size */
        }
        @media (max-width: 1200px) {
            .content2{
                padding-top: 3%;
                padding-left: 25%;
            }
        }
        @media (max-width: 900px) {
            .modal-content {
                background-color: #fefefe;
                margin: 10% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 80%; /* Could be more or less, depending on screen size */
            }
            .content2{
                padding-top: 3%;
                padding-left: 15%;
            }
            body{
                padding: 2% 10% 2% 10%;
            }
        }
        @media (max-height:98vh) {
            body{overflow: scroll; padding-bottom: 0px;}
            .content2{ height: 400px;}

        }
        .bb{
            margin: 30px;
            width: 300px;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {-webkit-transform: scale(0)}
            to {-webkit-transform: scale(1)}
        }

        @keyframes animatezoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        }
    </style>


</head>
<body>


<div class="content2">
<div class="row  ">
    <div class="md-4 ">
    </div>
    <div class="md-8 ">
        @if($Abonner->gender =='homme')
            <img class="rounded-circle ml-5 " width="150px" height="150px" src="/storage/gander/homme.jpg"  height="200px" class="card-img-top" alt="...">

        @else
            <img class="rounded-circle ml-5" width="150px" height="150px" src="/storage/gander/femme.png"  height="200px" class="card-img-top" alt="...">

        @endif
            <hr>
        <div style="text-align: center;">
            @if($Abonner->privliger == 'simple')
                <i class="fa fa-star-half text-danger"></i>
            @endif
            @if($Abonner->privliger == 'fan')
                <i class="fa fa-star text-danger"></i>
                <i class="fa fa-star text-danger"></i>
            @endif
            @if($Abonner->privliger == 'superfan')
                <i class="fa fa-star text-danger"></i>
                <i class="fa fa-star text-danger"></i>
                <i class="fa fa-star text-danger"></i>
                <span class=" ml-1 badge badge-danger">Super fun</span>
            @endif
               | {{$Abonner->point}} ptn
                @if($Abonner->pen == true)
                    <div class="row-md-12  alert alert-danger ">
                            <strong>depanaliser en :2017-12-3</strong>
                    </div>
                 @else
                    <br><br>
                @endif
            <h2>{{$Abonner->nom}}</h2>
            <h3>{{$Abonner->prenom}}</h3>
                <hr><strong>numéro de carte : </strong>{{$Abonner->num}}
                <hr><strong>email  : </strong>{{$Abonner->email}}
                <hr><strong>numéro de telephone : </strong>0{{$Abonner->telephone}}
                <hr><strong>email  : </strong>{{$Abonner->email}}
                <hr>
                <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-success">changer le mot de pass</button>
                <button onclick="document.getElementById('id02').style.display='block'" class="btn btn-primary">liste des livres preté</button>
                <div id="id01" class="modal">
                    <div class="modal-content animate" >
                        <form name="test" method="post" action="">
                            <label class="tt">ancien mot de pass :<br>
                                <input name="old" type="password" class="form-control " width="80%" />
                            </label>
                            <label class="tt">mot de pass<br>
                                <input name="password" id="password" type="password" class="form-control " width="80%" onkeyup='check();' />
                            </label>
                            <br>
                            <label class="tt">confirmer le mot de pass  <span id='message'></span><br>
                                <input type="password" name="confirm_password" class="form-control " id="confirm_password"  onkeyup='check();' />
                            </label>
                            <br>
                            <input type="submit" class="tt btn btn-dark" name="submit"  value="registration"  id="submit" disabled>

                        </form>

                        <script type="text/javascript">
                            var check = function() {
                                if (
                                    (document.getElementById('password').value ==
                                    document.getElementById('confirm_password').value)&&
                                    (document.getElementById('password').value.length ==
                                    document.getElementById('confirm_password').value.length)&&
                                    (document.getElementById('password').value.length > 0)
                                )
                                {
                                    document.getElementById('message').style.color = 'green';
                                    document.getElementById('message').innerHTML = '| mot de pass correct';
                                    document.getElementById('submit').disabled = false;
                                    document.getElementById('submit').className = 'tt btn btn-success';
                                } else {
                                    document.getElementById('message').style.color = 'red';
                                    document.getElementById('message').innerHTML = '| mot de pass incorrect';
                                    document.getElementById('submit').disabled = true;
                                    document.getElementById('submit').className = 'tt btn btn-dark';
                                }
                            }
                        </script>

                        <button class="bb btn btn-danger" id="can">cancel</button>

                    </div>
                </div>
                <div id="id02" class="modal">
                    <div class="modal-content1 animate" >
                       <div class="row" style="text-align: center;">
                           @foreach( $Abonner->emprunt as $emp)

                                       <div class="col-md-3">
                                           Title :<strong>{{$doc=\App\Document::where('code','=',$emp->code_doc)->first()->titre}}</strong>
                                           <br>
                                           numéro d'exemplaire :<strong>{{$emp->num_exem}}</strong>
                                           <br>
                                           date d'emprunt :<strong>{{$emp->date_emprunt}}</strong>
                                           <br>
                                           date de retour :<strong>{{$emp->date_retour}}</strong>
                                           <br>
                                       </div>
                           @endforeach
                       </div>
                        <div class="row" style="text-align: center;">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"> <button class="bb btn btn-success" id="can1">ok</button></div>
                        </div>
                    </div>
                </div>
                <hr>
                <a class="btn btn-dark"href="/userhome">accueil<i class="fa fa-home"></i> </a>
                <script>
                    // Get the modal
                    var modal1 = document.getElementById('id02');
                    var can1 = document.getElementById('can1');
                    can1.onclick=function () {
                        modal1.style.display = "none";
                    }
                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal1) {
                            modal1.style.display = "none";
                        }
                    }
                </script>
                <script>
                    // Get the modal
                    var modal = document.getElementById('id01');
                    var can = document.getElementById('can');
                    can.onclick=function () {
                        modal.style.display = "none";
                    }
                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>

        </div>
    </div>
</div>
    <div class="row bg-info">

    </div>
</div>












<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>

