@extends('index.dropdown')

@section('content1')

    <div class="alert ha res "  role="alert">
       <span class="alert-link mb-lg-5">
           <span><i class="fa fa-tags-large mr-1 fa-tags"></i>Catégori</span>
           @foreach($cat=\App\Categorie::all() as $cm)
               <a class="categori mr-2 btn-outline-dark"
                  href="/indexdoc?cate={{$cm->id}}">
                   {{$cm->name}}
               </a>
           @endforeach
       </span>
    </div>

    <div class="col">
        <div class="container cont ">
            <div class="row row-cols-4">
                @foreach($doc as $doccument)

                    <div class="col">
                        <div class="card  abo" style="width: 16rem;">
                            <img src="{{'/storage/books/'.$doccument->img}}"  height="120px" class="card-img-top" alt="...">
                            <div class="card-body">
                                @if(($doccument->livre)!= null)
                                    <h5 class="card-title">Code de livre :{{$doccument->code}}</h5>
                                    <h5 class="card-title">Titre :{{$doccument->titre}}</h5>
                                    <h6 class="card-title">ISBN : {{$doccument->livre->isbn}} </h6>
                                @else
                                    <h5 class="card-title">Code de Mémoire :{{$doccument->code}}</h5>
                                    <h5 class="card-title">titre :{{$doccument->titre}}</h5>
                                    <h6 class="card-title">Promotion : {{$doccument->memoire->promotion}} </h6>
                                @endif

                                <h6 class="card-title">nmbr exmaplaire :  <span style="margin-left: 50px;background: #F56A6A;" class="btn" >{{$doccument->nmb_dex}}</span></h6>
                                    @if($action == 'suprimer')
                                            <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-danger w-100 ">supprimer</button>
                                            <div id="id01" class="modal">

                                                <div class="modal-content animate" >
                                                    <span class="" style="text-align: center ; font-size: 2em;"><strong>supprimer ce document </strong> </span>
                                                    <a href="/destroy/{{$doccument->code}}"  class="bb btn btn-danger">oui supprimer le  </a>
                                                    <a href="{{route('index.doc')}}" class="btn btn-success bb " >anuller</a>
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
                                    @endif
                                    @if($action == 'index')
                                        <a href="/detailebook/{{$doccument->code}}" class="btn w-100  " style="background: #F56A6A;">Detaille</a>
                                    @endif
                                    @if($action == 'edit')
                                        <a href="/edit/{{$doccument->code}}" class="btn btn-success w-100  ">Modifier le Document</a>
                                    @endif
                            </div>
                        </div></div>
                @endforeach
            </div>
        </div>
    </div>


@endsection