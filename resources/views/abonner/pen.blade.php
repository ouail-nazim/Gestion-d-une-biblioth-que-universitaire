@extends('home1')

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
                                <a href="/pinaliser/{{$abo->id}}" class="btn btn-warning">pinaliser</a>



                            </div>
                        </div></div>
                @endforeach
            </div>
        </div>
    </div>


@endsection