@extends('index.dropdown')

@section('content1')

    <div class="row tt">
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
                                <div>suprime l'exomplaire num </div>
                            </span>
                            <form method="get" action="/exmoin/{{($doc->code)}}">
                                <input type="text" name="id" class="bb form-control" required PLACEHOLDER="entré le numéro d'exomplaire">
                                <input type="submit" class="bb btn btn-danger" value="delete it">
                            </form>
                            <button class="bb btn btn-success" id="can2">cancel</button>

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
            <div class="row">
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

            <div class="row flex-row-reverse">

                <div class="col-md-3 more">
                    <button onclick="document.getElementById('id01').style.display='block'"
                            class="btn btn-danger">Delet</button>
                    <div id="id01" class="modal">
                        <div class="modal-content animate" >
                            <span class="" style="text-align: center ; font-size: 2em;">
                                <strong>are you sure ??</strong>
                            </span>
                            <a href="/destroy/{{$doc->code}}"  class="bb btn btn-danger">yes delete it </a>
                            <button class="bb btn btn-success" id="can">cancel</button>

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
                    <a href="/edit/{{$doc->code}}" class="btn btn-info">Edit Profile </a>
                </div>
            </div>
            <br><br>
        </div>
        <div class="col-md-3 ml-2 ">
            <div class="row-md-12  boite-alert alert alert-dark ">
                <div class="row">
                    <strong class=""> Consulter exemplaire </strong>
                </div>
                <div class="row">
                    <div class=""> entré le numéro d'exemplaire</div>
                </div>

                <div class="row">
                    <form  action="#" method="get" class="form-inline" role="search">
                        {{csrf_field()}}
                        <input class="form-control form-control-sm w-75" type="text"
                               placeholder="{{($doc->code).'/...............'}}" aria-label="Search">
                        <button class="btn  my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="row-md-12  boite-alert alert alert-info " style="height: 13%;">
                <div class="row w-100 " >
                    <strong><em>nombre d'exomplaire preter :20000000 </em></strong>
                    <br>

                </div>
            </div>
            <div class="row-md-12  boite ">
                <div class="row">
                    <strong class="ml-lg-5 mb-3"><em>more books like this in :</em></strong>
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



@endsection