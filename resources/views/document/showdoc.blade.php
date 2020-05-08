@extends('index.dropdown')
@section('head')
    <style type="text/css">
        #etat{
            display: none;
        }
        #myInput {
            margin-left: 2%;
            font-size: 16px; /* Increase font-size */
            padding: 12px 20px 12px 40px; /* Add some padding */
            margin-bottom: 12px; /* Add some space below the input */
        }
        #myTable{
            width: 100%;
        }
        td{
            border-bottom: 1px solid black;
        }
        .retarde{
            background: #9fc1f0;
            background: -webkit-linear-gradient(to right, #ff7a32, #ff7367);
            background: linear-gradient(to right, #ff7a32, #ff7367);
        }
        .filterDiv {
            display: none;
        }
        .show {
            display:table-row; ;
        }
    </style>

@endsection

@section('content1')
    @if(false)
        <div style=" padding: 20px;
          background-color: #f44336;
          color: white;
          opacity: 1;
          transition: opacity 0.6s;
          border-radius:7px;
          margin-bottom: 15px;">
          <span class="closebtn" style=" margin-left: 15px;
          color: white;
          font-weight: bold;
          float: right;
          font-size: 22px;
          line-height: 20px;
          cursor: pointer;
          transition: 0.3s;">&times;</span>
            <strong>ooops!</strong> l rechercher  n'exist pas.
        </div>
        <script>
            var close = document.getElementsByClassName("closebtn");
            var i;

            for (i = 0; i < close.length; i++) {
                close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                }
            }
        </script>
    @endif

    <div class="row">
        <div class="col-md-8  pro boite ">

            <div class="row ">
                {{--photo--}}
                <div class="col-md-4 ">
                        <img class=" " width="150px" height="150px" src="{{'/storage/books/'.$doc->img}}"  height="200px" class="card-img-top" alt="...">

                </div>
                {{--nom + prénom--}}
                <div class="col-md-7">
                    <br>
                    <h2>
                        <div class="row ">
                            <div class="col-md-4">Type</div>
                            @if(($doc->livre)!= null)
                                {{'livre'}}<br>
                            @else
                                {{'memoire'}}<br>
                            @endif
                        </div>
                    </h2>
                    <h3>
                        <div class="row ">
                            <div class="col-md-4">Titre</div>
                            {{($doc->titre)}}
                        </div>
                    </h3>
                    <h3>
                        <div class="row ">
                            <div class="col-md-4">Code</div>
                            {{($doc->code)}}
                        </div>
                    </h3>
                </div>
            </div>
            <br><br>
            {{--info--}}
            @if(($doc->livre)!= null)
                <div class="row">
                    <div class="col-md-4">
                        <strong> ISBN de livre</strong>
                    </div>
                    <strong> {{($doc->livre->isbn)}}</strong>
                </div>
                <br >
            @else
                <div class="row">
                    <div class="col-md-4">
                        <strong> promotion de memoire</strong>
                    </div>
                    <strong> {{($doc->memoire->promotion)}}</strong>
                </div>
                <br >
            @endif
            <div class="row">
                <div class="col-md-4">
                    <strong> nombre d'exomplaire</strong>
                </div>
                <br>
                <span class="btn badge-dark text-white ">{{($nombre_ex)}}</span>
                <a href="/explus/{{($doc->code)}}" class="btn badge-success"
                   style="border-radius: 50%;margin-left: 35%;"><i class="fa fa-plus"></i>
                </a>
                <div >
                    <button type="button"
                            @if($doc->nmb_dex >0) onclick="document.getElementById('id02').style.display='block'"@endif
                            class="btn badge-danger @if($doc->nmb_dex ==0) disabled btn badge-dark @endif"
                            style="border-radius: 50%;margin-left: 50%;"><i class="fa fa-minus"></i></button>
                    <div id="id02" class="modal">
                        <div class="modal-content animate" >
                             <span class="" style="text-align: center ; font-size: 2em;">
                                <div>supprimer l'exomplaire num </div>
                            </span>
                            <form method="get" action="/exmoin/{{($doc->code)}}">
                                <input type="number"  name="id" class="bb form-control" required PLACEHOLDER="entré le numéro d'exomplaire">
                                <input type="submit" class="bb btn btn-danger" value="supprimer">
                            </form>
                            <button class="bb btn btn-success" id="can2">anuller</button>

                        </div>
                    </div>
                    <script>
                        // Get the modal
                        var modal2 = document.getElementById('id02');
                        var can2 = document.getElementById('can2');
                        can2.onclick=function () {
                            modal2.style.display = "none";
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
            <br >
            <div class="row">
                <div class="col-md-4">
                    <strong> Emplacment de livre</strong>
                </div>
                <strong> {{($doc->emplacment)}}</strong>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <strong> Date de edition</strong>
                </div>
                <strong> {{($doc->annee)}}</strong>

            </div>
            <br >
            <div class="row">
                <div class="col-md-3">
                    <strong> l'auteur de livre</strong>
                </div>
                <ul style="margin-left: 2%">
                @foreach($doc->auteur as $auteurs )
                        <li><strong><i class="fa fa-user"></i> {{$auteurs->nom}}__{{$auteurs->prenom}} </strong></li>
                @endforeach
                </ul>
            </div>
            <div class="row mb-3">
                @if(($doc->livre)!= null)

                        <div class="col-md-4">
                            <strong>  l'editeur de livre</strong>
                        </div>
                        <strong> {{$doc->livre->edition}}</strong>
                    <br >

                @else
                    <div class="col-md-4">
                        <strong> encadreures de mémoire</strong>
                    </div>
                    <ul style="margin-left: -6.5%">
                        @foreach($doc->memoire->encadreure as $encadreures )
                            <li><strong><i class="fa fa-user-md"></i> {{$encadreures->nom}}__{{$encadreures->prenom}} </strong></li>
                        @endforeach
                    </ul>
                @endif

            </div>

            <div class="row flex-row-reverse ">

                <div class="col-md-3 more">
                    <button onclick="document.getElementById('id01').style.display='block'"
                            class="btn btn-danger">supprimer</button>
                    <div id="id01" class="modal">
                        <div class="modal-content animate" >
                            <span class="" style="text-align: center ; font-size: 2em;">
                                <strong>supprimer ce document</strong>
                            </span>
                            <a href="/destroy/{{$doc->code}}"  class="bb btn btn-danger">oui supprimer</a>
                            <button class="bb btn btn-success" id="can">anuller</button>

                        </div>
                    </div>
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
                <div class="col-md-3 more " >
                    <a href="/edit/{{$doc->code}}" class="btn btn-success">Modifier le document</a>
                </div>
                <div class="col-md-5 more "  >
                    <button class="btn btn-info"  onclick="document.getElementById('etat').style.display='block'">
                        Consulter les Exemplaire</button>
                </div>
            </div>
            <br><br>
        </div>
        <div class="col-md-3 ml-2 ">
            <div class="row-md-12  boite-alert alert alert-info " style="height: 13%;">
                <div class="row w-100 " >
                    <strong><em>nombre d'exomplaire preter :{{$prété}}</em></strong>
                    <br>

                </div>
            </div>
            <div class="row-md-12  boite ">
                <div class="row">
                    <strong class="ml-lg-5 mb-3"><em>plus de livres comme celui-ci dans :</em></strong>
                </div>
                <ul class="">
                    @foreach($doc->categories as $categorie)
                        <li class="mr-lg-5">
                            <div class="row">
                                <div class="col w-100">
                                    <a class="btn w-100 btn-outline-dark"
                                       href="/indexdoc?cate={{$categorie->id}}">
                                        {{$categorie->name}}
                                    </a>
                                </div>

                            </div>
                        </li>
                        <br>
                    @endforeach
                </ul>
            </div>

        </div>

    </div>
    <div id="etat" class="row pro m-4 p-3 boite" >

        <div class="row">
            <input type="text" class="form-control w-75" maxlength="20" id="myInput" onkeyup="myFunction()" placeholder="Entré l'identif d'Exemplaire ..... " >
            <button type="button"
                    onclick="document.getElementById('etat').style.display='none'"
                    class="btn badge-danger"
                    style="border-radius: 50%;
                            margin-left: auto;
                           margin-right: 3%;
                          color: #f3faff;
                          font-weight: bolder;
                          float: right;
                          font-size: 20px;
                          cursor: pointer;margin-bottom: 2%;">&times;</button>
        </div>
           <table class="table table-striped " id="myTable" >
                <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">disponibilite</th>
                    <th scope="col">etat</th>
                    <th scope="col">date d'ajoute aux bibliothèque</th>
                </tr>
                </thead>
                <tbody class="bg-light bod">
                @foreach($doc->exemplaire as $exemplaire)
                    <tr>
                        <td scope="row">{{$exemplaire->identif}}</td>
                        <td>
                            @if(($exemplaire->disponibilite))
                                disponible
                            @else
                                non disponible
                            @endif
                        </td>
                        <td>
                            <?php
                            switch ($exemplaire->etat) {
                                case 100 : echo "<span style='background: #C352F3;border-radius: 10%;width:auto ;' >NEUF</span>";  break;
                                case 90 :  echo "<span style='background: #0309F1;border-radius: 10%;width:auto ;' >Parfait</span>";  break;
                                case 80 :  echo "<span style='background: #29A1FE;border-radius: 10%;width:auto ;' >Tres bon état</span>";   break;
                                case 70 :  echo "<span style='background: #3AFEEA;border-radius: 10%;width:auto ;' >Bon état</span>";  break;
                                case 60 :  echo "<span style='background: #32FE00;border-radius: 10%;width:auto ;' >Assez bon etat</span>";  break;
                                case 50 :  echo "<span style='background: #B9FE00;border-radius: 10%;width:auto ;' >etat satisfaisant</span>";  break;
                                case 40 :  echo "<span style='background: #FEF600;border-radius: 10%;width:auto ;' >état passable</span>";  break;
                                case 30 :  echo "<span style='background: #FE7700;border-radius: 10%;width:auto ;' >mauvais état </span>";   break;
                                case 20 :  echo "<span style='background: #FE0400;border-radius: 10%;width:auto ;' >déchiré </span>";   break;
                            }
                            ?>
                        </td>
                        <td>{{$exemplaire->created_at->toDateString()}}</td>

                    </tr>
                @endforeach


                </tbody>
            </table>
            <script type="text/javascript">
                function myFunction() {
                    // Declare variables
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("myTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }

            </script>

        </div>


@endsection