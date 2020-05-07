@extends('index.dropdown')

@section('content1')

    <div style=" padding: 20px;
        margin-top: -4%;
          background-color: #F56A6A;
          color: white;
          font-weight: bold;
          opacity: 1;
          transition: opacity 0.6s;
          border-radius:4px;
          ">
          {{--<span class="closebtn " style=" margin-left: 15px;--}}
          {{--color: white;--}}
          {{--font-weight: bold;--}}
          {{--float: right;--}}
          {{--font-size: 22px;--}}
          {{--line-height: 20px;--}}
          {{--cursor: pointer;--}}
          {{--transition: 0.3s;">&times;</span>--}}
        @if((count($abonner))==0 )
            <strong>Aucun abonné n’ai trouvé</strong>
        @else
            Le nombre totale des Abonneé trouvé est :<strong>{{count($abonner)}}</strong>
        @endif

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

    <div class="col">
        <div class="container ">
            <div class="row row-cols-4 alert ">

                @foreach($abonner as $abo)
                    @if($abo->pen == false)

                        <div class="col">
                            <div class="card cc "  >
                                @if($abo->gender =='homme')
                                    <img src="storage/gander/homme.jpg"  height="100px" width="100%"   alt="...">

                                @else
                                    <img src="storage/gander/femme.png"  height="100px" width="100%" alt="...">

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
                                            <span class="badge badge-danger">VIP</span>
                                        @endif

                                    <div class="card-title">nom  : {{$abo->nom}}</div>
                                    <div class="card-title">prénom  : {{$abo->prenom}}</div>
                                    <div class="card-title">numéro de cart : {{$abo->num}}</div>
                                    <a href="/more/{{$abo->id}}" class="btn " style="background: #F56A6A;">Détaillé</a>



                                </div>
                            </div></div>

                    @else

                        <div class="col">
                            <div class="card cc alert-danger"  >
                                @if($abo->gender =='homme')
                                    <img src="storage/gander/homme.jpg"  height="100px" width="100%"   alt="...">

                                @else
                                    <img src="storage/gander/femme.png"  height="100px" width="100%" alt="...">

                                @endif
                                <div class="card-body">
                                    <i class="fa fa-minus-circle mr-2"></i>cet abonné est pénalisé<i class="fa fa-minus-circle ml-2"></i>
                                    <div class="card-title">nom  : {{$abo->nom}}</div>
                                    <div class="card-title">prénom  : {{$abo->prenom}}</div>
                                    <div class="card-title">numéro de cart : {{$abo->num}}</div>
                                    <a href="/more/{{$abo->id}}" class="btn btn-outline-danger">Détaillé</a>
                                </div>
                            </div></div>

                    @endif



                @endforeach
            </div>
        </div>
    </div>


@endsection