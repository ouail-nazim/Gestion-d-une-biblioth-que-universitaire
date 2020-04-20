@extends('index.dropdown')

@section('head')
<style>
    .card-text{
        text-align: center;
        font-size:2em;
        font-family: "Inconsolata", "Fira Mono", "Source Code Pro", Monaco, Consolas, "Lucida Console", monospace;
    }
    .card{
        font-size: 14px;
        font-weight: bold;
        height: 170px;
    }
    .abonner{border-left: 4px #2dd4e3 solid;}
    .document{border-left: 4px #5dff12 solid;}
    .livre{border-left: 4px #690303 solid;}
    .mem{border-left: 4px #a8a699 solid;}
    .cat{border-left: 4px #9e0aa1 solid;}
    .exemplaire{border-left: 4px #ede905 solid;}
    .aler{
        background: -webkit-linear-gradient(to right, #f2e6bf, #eb3636);
        background: linear-gradient(to right, #f2e6bf, #eb3636);
        border-left: 4px #f00 solid;
    }
</style>
@endsection

@section('content1')
    <div class="row row-cols-1 row-cols-md-5">
        <div class="col mb-3">
            <div class="card  abonner mb-3" style="max-width: 18rem;">
                <div class="card-header ">Abonner</div>
                <div class="card-body">
                    <h6 class="card-title">le nombre total des abonneés :</h6>
                    <p class="card-text "> {{$abonner}}</p>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card abonner mb-3" style="max-width: 18rem;">
                <div class="card-header">Abonner Simple
                </div>
                <div class="card-body">
                    <h6 class="card-title">le nombre des abonneés simple :</h6>
                    <p class="card-text "> {{$abonnersimple}}</p>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card abonner mb-3" style="max-width: 18rem;">
                <div class="card-header">Abonneés fan
                    <i class="fa fa-plus-large mr-1 fa-star-half"></i>
                </div>
                <div class="card-body">
                    <h6 class="card-title">le nombre des abonneés super fan</h6>
                    <p class="card-text "> {{$abonnerfan}}</p>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card abonner mb-3" style="max-width: 18rem;">
                <div class="card-header">Abonneés Super fan
                    <i class="fa fa-plus-large mr-1 fa-star"></i>
                </div>
                <div class="card-body">
                    <h6 class="card-title">le nombre des abonneés super fan</h6>
                    <p class="card-text "> {{$abonnersuper}}</p>
                </div>
            </div>
        </div>
        <div class="col mb-3">

            <div class="card aler mb-3" style="max-width: 18rem;">
                <div class="card-header">Abonneés Pinaliser
                    <i class="fa fa-plus-large mr-1 fa-minus-circle"></i>
                </div>
                <div class="card-body">
                    <h6 class="card-title">le nombre des abonneés pinaliser :</h6>
                    <p class="card-text "> {{$abonnerpen}}</p>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card document mb-3" style="max-width: 18rem;">
                <div class="card-header">Document</div>
                <div class="card-body">
                    <h6 class="card-title">le nombre total des document :</h6>
                    <p class="card-text "> {{$document}}</p>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card livre mb-3" style="max-width: 18rem;">
                <div class="card-header">Livre</div>
                <div class="card-body">
                    <h6 class="card-title">le nombre total des livre :</h6>
                    <p class="card-text "> {{$livre}}</p>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card mem mb-3" style="max-width: 18rem;">
                <div class="card-header">Mémoire</div>
                <div class="card-body">
                    <h6 class="card-title">le nombre total des mémoire :</h6>
                    <p class="card-text "> {{$mem}}</p>
                </div>
            </div>
        </div>
        <div class="col mb-3">

            <div class="card exemplaire mb-3" style="max-width: 18rem;">
                <div class="card-header">
                    Exemplaire
                </div>
                <div class="card-body">
                    <h6 class="card-title">le nombre total des exemplaire :</h6>
                    <p class="card-text "> {{$exem}}</p>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card aler mb-3" style="max-width: 18rem;">
                <div class="card-header">Exemplaire Prété</div>
                <div class="card-body">
                    <h6 class="card-title">le nombre total des exemplaire prete :</h6>
                    <p class="card-text "> {{$exempret}}</p>
                </div>
            </div>
        </div>
        <div class="col mb-3">

            <div class="card cat mb-3" style="max-width: 18rem;">
                <div class="card-header">Categorie</div>
                <div class="card-body">
                    <h6 class="card-title">le nombre total des categorie :</h6>
                    <p class="card-text "> {{$cat}}</p>
                </div>
            </div>
        </div>
    </div>


@endsection