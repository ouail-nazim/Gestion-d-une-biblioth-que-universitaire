@extends('index.dropdown')

@section('content1')

    <div class="alert ha res " align="center" role="alert">
       <span class="alert-link">
           {{count($abonner)}} abonner is found
       </span>
    </div>

    <div class="col">
        <div class="container ">
            <div class="row row-cols-3 alert ">

                @foreach($abonner as $abo)
                    @if($abo->pen == false)

                        <div class="col">
                            <div class="card abo "  >
                                @if($abo->gender =='homme')
                                    <img src="storage/gander/homme.jpg"  height="150px"   alt="...">

                                @else
                                    <img src="storage/gander/femme.png"  height="150px" alt="...">

                                @endif

                                <div class="card-body">
                                    @if($abo->privliger == 'simple')
                                        <i class="fa fa-star-half text-danger"></i>

                                    @endif
                                    @if($abo->privliger == 'fan')
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star text-danger"></i>

                                        @endif
                                        @if($abo->privliger == 'superfan')
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star text-danger"></i>
                                            <span class="badge badge-danger">Super fun</span>
                                        @endif
                                        <br><br>
                                    <div class="card-title">nom  : {{$abo->nom}}</div>
                                    <div class="card-title">prénom  : {{$abo->prenom}}</div>
                                    <div class="card-title">numéro de cart : {{$abo->num}}</div>
                                        <br>
                                    <a href="/more/{{$abo->id}}" class="btn btn-primary">Detaile</a>



                                </div>
                            </div></div>

                    @else

                        <div class="col">
                            <div class="card abo alert-danger" >
                                @if($abo->gender =='homme')
                                    <img src="storage/gander/homme.jpg"  height="150px"   alt="...">

                                @else
                                    <img src="storage/gander/femme.png"  height="150px" alt="...">

                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">Name:{{$abo->nom}}</h5>
                                    <h5 class="card-title">last name:{{$abo->prenom}}</h5>
                                    <h6 class="card-title">id: {{$abo->num}}</h6>
                                    <br><br>
                                    <a href="/more/{{$abo->id}}" class="btn btn-outline-danger">See More</a>
                                    <a href="/Depinaliser/{{$abo->id}}" class="btn btn-outline-success"> Depinaliser</a>



                                </div>
                            </div></div>

                    @endif



                @endforeach
            </div>
        </div>
    </div>


@endsection