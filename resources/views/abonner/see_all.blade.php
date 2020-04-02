@extends('home1')

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
                            <div class="card cc " style=" width: 17rem; height:450px;margin: 10px;" >
                                @if($abo->gender =='homme')
                                    <img src="storage/gander/homme.jpg"  height="200px" class="card-img-top" alt="...">

                                @else
                                    <img src="storage/gander/femme.png"  height="200px" class="card-img-top" alt="...">

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
                                    <h5 class="card-title">nom  : {{$abo->nom}}</h5>
                                    <h5 class="card-title">prénom  : {{$abo->prenom}}</h5>
                                    <h6 class="card-title">numéro de cart : {{$abo->num}}</h6>
                                        <br>
                                    <a href="/more/{{$abo->id}}" class="btn btn-primary">Detaile</a>



                                </div>
                            </div></div>

                    @else

                        <div class="col">
                            <div class="card cc alert-danger" style=" width: 17rem;height:450px;margin: 10px;">
                                @if($abo->gender =='homme')
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTLn7EB9CPw0lbKB4sqY-1wMSYszzYwJgY4qbKncnDtY6JVZ2Fo"  height="200px" class="card-img-top" alt="...">

                                @else
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQWR44-rmbP9mccq7VRe19cL5v4NIrFI0jnIetdCqyCGTtE3fqe"  height="200px" class="card-img-top" alt="...">

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