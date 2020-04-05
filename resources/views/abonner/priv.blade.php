@extends('index.dropdown')

@section('content1')



    <div class="col">
        <div class="container">
            <div class="row row-cols-3">
                @foreach($abonner as $abo)
                    <div class="col">
                        <div class="card cc " style="width: 18rem;">
                            @if($abo->gender =='homme')
                                <img src="storage/gander/homme.jpg"  height="200px" class="card-img-top" alt="...">

                            @else
                                <img src="storage/gander/femme.png"  height="200px" class="card-img-top" alt="...">

                            @endif
                                <div class="card-body">
                                <h5 class="card-title">Name:{{$abo->nom}}</h5>
                                <h5 class="card-title">last name:{{$abo->prenom}}</h5>
                                <h6 class="card-title">id: {{$abo->num}}</h6>
                                @if ($abo->privliger == 'simple')
                                    <a href="/privliger/{{$abo->id}}" class="btn btn-success">up gread to fun
                                        <i class="fa fa-star text-white"></i>
                                        <i class="fa fa-star text-white"></i>
                                    </a>

                                @endif
                                @if($abo->privliger == 'fan')
                                    <a href="/privliger/{{$abo->id}}" class="btn btn-success">up gread to super fun
                                        <i class="fa fa-star text-white"></i>
                                        <i class="fa fa-star text-white"></i>
                                        <i class="fa fa-star text-white"></i>
                                    </a>
                                @endif

                                @if($abo->privliger == 'superfan')
                                        <i class="fa fa-star text-danger"></i>
                                        <i class="fa fa-star text-danger"></i>
                                        <i class="fa fa-star text-danger"></i>
                                        <p >allready super fun  <a style="margin-left: 80px;" href="/See_all" class="btn btn-dark"><i class="fa fa-arrow-left bg-text-whith"></i></a>
                                        </p>

                                    @endif











                            </div>
                        </div></div>
                @endforeach
            </div>
        </div>
    </div>


@endsection