@extends('index.dropdown')


@section('content1')

<div class="row">
    <div class="col-md-7 mr-4 pro boite ">

        <div class="row ">
            {{--photo--}}
            <div class="col-md-4 ">
                @if($Abonner->gender =='homme')
                    <img class="rounded-circle " width="150px" height="150px" src="/storage/gander/homme.jpg"  height="200px" class="card-img-top" alt="...">

                @else
                    <img class="rounded-circle " width="150px" height="150px" src="/storage/gander/femme.png"  height="200px" class="card-img-top" alt="...">

                @endif
            </div>
            {{--nom + prénom--}}
            <div class="col-md-5">
                <br>
                <h2>{{$Abonner->nom}}</h2>
                <h3>{{$Abonner->prenom}}</h3>
            </div>
            {{--grade--}}
            <div class="col-md-3 gra">
                @if($Abonner->privliger == 'simple')
                    <i class="fa fa-star-half text-danger"></i>
                    <br>
                @endif
                @if($Abonner->privliger == 'fan')
                    <i class="fa fa-star text-danger"></i>
                    <i class="fa fa-star text-danger"></i>
                @endif
                @if($Abonner->privliger == 'superfan')
                    <i class="fa fa-star text-danger"></i>
                    <i class="fa fa-star text-danger"></i>
                    <i class="fa fa-star text-danger"></i>
                        <br>
                    <span class="badge badge-danger">VIP</span>
                @endif
            </div>
        </div>
        <br><br>
        {{--info--}}
        <div class="row">
            <div class="col-md-3">
               <strong> Numéro de carte</strong>
            </div>
            {{$Abonner->num}}
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
               <strong> Sexe</strong>
            </div>
            {{$Abonner->gender}}
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
               <strong> @Email</strong>
            </div>
            {{$Abonner->email}}
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
               <strong> Telephone</strong>
            </div>
            {{$Abonner->telephone}}
        </div>
        <br>
        {{--option--}}
        <div class="row">
            <div class="col-md-4 more "></div>
            <div class="col-md-4 more " >
                <a href="/editAbonner2/{{$Abonner->num}}" class="btn btn-success">Modifier le Profile </a>
            </div>
            <div class="col-md-4 more">
                <button onclick="document.getElementById('id01').style.display='block'"
                        class="btn btn-danger">Suprimer l'abonné</button>
                <div id="id01" class="modal">
                    <div class="modal-content animate" >
                        <span class="" style="text-align: center ; font-size: 2em;"><strong>vous voulez supprimer cet abonneé ?</strong> </span>
                        <a href="/delete/{{$Abonner->id}}"  class="bb btn btn-danger">oui supprimer  </a>
                        <button class="bb btn btn-success" id="can">annuler</button>

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
            {{--<div class="col-md-2 more">--}}
                {{--@if($Abonner->pen == true)--}}
                    {{--<a href="/Depinaliser/{{$Abonner->id}}" class="btn btn-primary"> Depinaliser</a>--}}
                {{--@else--}}
                    {{--<a href="/pinaliser/{{$Abonner->id}}" class="btn btn-warning">Penaliser</a>--}}
                {{--@endif--}}

            {{--</div>--}}
            {{--<div class="col-md-2 more">--}}
                {{--@if($Abonner->pen == false)--}}
                    {{--@if ($Abonner->privliger == 'simple')--}}
                        {{--<a href="/privliger/{{$Abonner->id}}" class="btn btn-info">--}}
                            {{--<strong> fun</strong>--}}
                        {{--</a>--}}

                    {{--@endif--}}
                    {{--@if($Abonner->privliger == 'fan')--}}
                        {{--<a href="/privliger/{{$Abonner->id}}" class="btn btn-info">--}}
                            {{--<strong>super fun</strong>--}}
                        {{--</a>--}}
                    {{--@endif--}}

                    {{--@if($Abonner->privliger == 'superfan')--}}
                            {{--<a href="#" class="btn btn-secondary  disabled" >max </a>--}}
                    {{--@endif--}}
                {{--@else--}}
                   {{--<a href="#" class="btn btn-secondary  disabled" >privliger</a>--}}
                {{--@endif--}}
            {{--</div>--}}
        </div>
        <br><br>
    </div>
    <div class="col-md-4 ">
        <div class="row-md-12 point  boite-alert alert alert-success ">
            <div class="row">
                <strong> point : {{$Abonner->point}}</strong>
            </div>
        </div>
        @if($Abonner->pen == true)
            <div class="row-md-12 point boite-alert alert alert-danger ">
                <div class="row">
                    <strong>depanaliser en :2017-12-3 </strong>
                    <a href="/Depinaliser/{{$Abonner->id}}" class="ml-4 link"> Depinaliser</a>


                </div>
            </div>
        @endif
        <div class="row-md-12 liste boite ">
            <ul class="">
                @foreach( $Abonner->emprunt as $emp)
                    <li class="">
                        <div class="row">
                            <div class="col-md-7 mr-2">
                                Le titre :<strong>{{$doc=\App\Document::where('code','=',$emp->code_doc)->first()->titre}}</strong>
                                <br>
                                numéro d'exemplaire :<strong>{{$emp->num_exem}}</strong>
                                <br>
                                date d'emprunt :<strong>{{$emp->date_emprunt}}</strong>
                                <br>
                                date de retour :<strong>{{$emp->date_retour}}</strong>
                                <br>
                            </div>
                            <div class="col-md-3">

                                <div class="col-md-3 more">

                                    @if(($emp->renouvler) ==false)
                                        <a href="/renouvler/{{$emp->id}}"  class=" btn btn-dark " style="position:absolute; margin-left: -10px;">renouvler </a>
                                    @else
                                        <button onclick="document.getElementById('id03').style.display='block'" class=" btn btn-dark" style="position:absolute; margin-left: -10px;">renouvler</button>
                                        <div id="id03" class="modal">
                                            <div class="modal-content animate" >
                                                <span class="" style="text-align: center ; font-size: 2em;"><strong>ce document deja renouvle</strong> </span>
                                                <button class="bb btn btn-success" id="can2">OK</button>
                                            </div>
                                        </div>
                                        <script>
                                            // Get the modal
                                            var modal3 = document.getElementById('id03');
                                            var can = document.getElementById('can2');
                                            can.onclick=function () {
                                                modal3.style.display = "none";
                                            }
                                        </script>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                    <hr>
                @endforeach
            </ul>
        </div>
    </div>
</div>



@endsection