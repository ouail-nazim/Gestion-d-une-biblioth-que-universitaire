@extends('index.dropdown')

@section('content1')

    <div class="col">
        <div class="container">
            <div class="row row-cols-3">
                    @foreach($abonner as $abo)
                    <div class="col">
                            <div class="card cc " style="width: 18rem;">
                                @if($abo->gender =='homme')
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTLn7EB9CPw0lbKB4sqY-1wMSYszzYwJgY4qbKncnDtY6JVZ2Fo"  height="200px" class="card-img-top" alt="...">

                                @else
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQWR44-rmbP9mccq7VRe19cL5v4NIrFI0jnIetdCqyCGTtE3fqe"  height="200px" class="card-img-top" alt="...">

                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">nom:{{$abo->nom}}</h5>
                                    <h5 class="card-title">prénom:{{$abo->prenom}}</h5>
                                    <h6 class="card-title">numéro de carte: {{$abo->num}}</h6>
                                    <div class="d-inline-flex " style="width:100%;">
                                        @if(count($abo->emprunt)== null)
                                            <div class=" ">
                                                <button onclick="document.getElementById('id01').style.display='block'"
                                                        class="btn btn-danger mt-3 ">supprimer</button>
                                                <div id="id01" class="modal">

                                                    <div class="modal-content animate" >
                                                        <span class="" style="text-align: center ; font-size: 2em;"><strong>vous voulez supprimer cet abonneé ?</strong> </span>
                                                        <a href="/delete/{{$abo->id}}"  class="bb btn btn-danger">oui supprimer le  </a>
                                                        <a href="/See_all" class="btn btn-success bb " >annuler</a>
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
                                        @else
                                            <span class="text-bold text-danger">
                                                impossible de supprimer ce abonné ,par ce que il est  préter des livre
                                            </span>
                                        @endif



                                    </div>

                                </div>
                            </div></div>
                    @endforeach
            </div>
        </div>
    </div>


@endsection