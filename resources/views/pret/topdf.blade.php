<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-TileImage" content="/2.jpg">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ 'I Q R A ' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        body{
            margin: 2% 10% 2% 10%;
        }
        .head{
            text-align: center;
        }
        .right{
            text-align: right;
        }
        .bn{
            position: absolute;
            top: 10%;
            right: 5%;
            width: 150px;
        }
        .bn1{
            position: absolute;
            top: 20%;
            right: 5%;
            width: 150px;
        }
    </style>
</head>
<body>
<div>
    <div class="head">
        <a class="btn btn-danger bn" id="pfd" href="/topdf/{{$emprunt->id}}"
        > imprimer pdf <i class="fa fa-file-pdf-o" ></i></a>
        <script>
            var pfd = document.getElementById('pfd');
            pfd.onclick=function () {
                pfd.style.display = "none";
            }
        </script>
        <a class="btn btn-success bn1" href="/home"> page d'accueil<i class="fa fa-home"></i> </a>
        <h5>الجمهورية الجزائرية الديمقراطية الشعبية </h5>
        <h6>La République Algérienne Démocratique et Populaire</h6>
        <br>
        <h5>وزارة التعليم العالي والبحث العلمي </h5>
        <h6>Ministère de l'Enseignement supérieur et de la Recherche scientifique</h6>
        <br>
    </div>
    <div class="row">
        <div class="col-md-4">
            Universite Constantine 2 Abdelhamid Mehri
            <br>
            Faculté des nouvelles technologies de
            <br>
            l'information et de la Communication
        </div>
        <div class="col-md-4 head ">
            <img src="/lo.png" height="80%" width="80%">
        </div>
        <div class="col-md-4 right">
                        جامعة قسنطينة 2 عبد الحميد مهري
            <br>
            كلية التكنولوجيات الحديثة للمعلومات والاتصال
        </div>
    </div>
    <br><br>
    <div class="row" class="head">

        <h3 > attestation de prêt num="{{$emprunt->id}}"</h3>

    </div>
    <div class="row" >

        <p>
            le chef de bibliothèque de Faculté des nouvelles technologies de l'information et de la Communication
            <br>atteste que l'etudient(e):
            <br><br>
            <strong>Nom :</strong>{{$abo->nom}}
            <br><strong>Prenom :</strong>{{$abo->prenom}}
            <br><strong>sous le matricule :</strong>{{$abo->num}}
            <br><br>
            Il a fait le prêt de document :
            <br><br>
            <strong>Titre :</strong>{{$doc->titre}}
            <br><strong>Code :</strong>{{$doc->code}}
            <br><strong>l'exemplaire numéro :</strong>{{$E1->identif}}
            <br><br> en {{$emprunt->date_emprunt}} , et il doit le retourner en {{$emprunt->date_retour}}
        </p>

    </div>
</div>
</body>
</html>