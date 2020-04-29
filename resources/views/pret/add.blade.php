@extends('index.dropdown')
@section('content1')
    @if($msg)

        <div style="width: 80%;height: 50px;
        background: -webkit-linear-gradient(to right, #c20817, #eb3636);
        background: linear-gradient(to right, #c20817, #eb3636);
        border-left: 4px #000 solid;
        border-radius: 0px 20px 20px 0px;
        padding-left: 30px;
        padding-top: 5px;
        font-family: bold;
        color: white;
        margin-left:100px;
        ">
          <h4>{{$msg[0]}}</h4>
        </div>
        <br>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <h3 align="center">formulaire est mal rempli</h3>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif


    <form class="needs-validation" method="post" action="savepret" novalidate>
        {{csrf_field()}}
       <div class="row">
           <div class="col-md-6">
               <div class="form-row">
                   <div class="col-md-2 mb-3"></div>
                   <div class="col-md-8 mb-3" style="text-align: center;" >
                       <img class="rounded-circle " width="150px" height="150px" src="/storage/gander/homme.jpg"  height="200px" class="card-img-top" alt="...">

                   </div>
                   <div class="col-md-2 mb-3"></div>
               </div>
               <div class="form-row">
                   <div class="col-md-2 mb-3"></div>
                   <div class="col-md-8 mb-3">
                       <label for="validationCustom01">Numéro de carte</label>
                       <input type="text" maxlength="15" class="form-control" name="numcart" id="validationCustom01" required>
                       <div class="invalid-feedback">entrer une valeur correct</div>
                   </div>
                   <div class="col-md-2 mb-3"></div>
               </div>
               <div class="form-row">
                   <div class="col-md-2 mb-3"></div>
                   <div class="col-md-8 mb-3">
                       <label for="validationCustom01">Le nom</label>
                       <input type="text" class="form-control"  maxlength="20" name="nom" id="validationCustom01" required>
                       <div class="invalid-feedback">entrer une valeur correct</div>
                   </div>
                   <div class="col-md-2 mb-3"></div>
               </div>
               <div class="form-row">
                   <div class="col-md-2 mb-3"></div>
                   <div class="col-md-8 mb-3">
                       <label for="validationCustom01" >LE prénom</label>
                       <input type="text" class="form-control" maxlength="20" name="prenom" id="validationCustom01" required>
                       <div class="invalid-feedback">entrer une valeur correct</div>
                   </div>
                   <div class="col-md-2 mb-3"></div>
               </div>

           </div>
           <div class="col-md-6">
               <div class="form-row">
                   <div class="col-md-2 mb-3"></div>
                   <div class="col-md-8 mb-3" style="text-align: center;" >
                       <img class=" " width="150px" height="150px" src="/book.png"  height="200px" class="card-img-top" alt="...">

                   </div>
                   <div class="col-md-2 mb-3"></div>
               </div>
               <div class="form-row">
                   <div class="col-md-2 mb-3"></div>
                   <div class="col-md-8 mb-3">
                       <label for="validationCustom01">Code de document</label>
                       <input type="text" class="form-control" maxlength="10" name="codedoc" id="validationCustom01" required>
                       <div class="invalid-feedback">entrer une valeur correct</div>
                   </div>
                   <div class="col-md-2 mb-3"></div>
               </div>
               <div class="form-row">
                   <div class="col-md-2 mb-3"></div>
                   <div class="col-md-8 mb-3">
                       <label for="validationCustom01">Numéro d'exemplair</label>
                       <input type="number" min="0" class="form-control" name="numexem" id="validationCustom01"  required>
                       <div class="invalid-feedback">entrer une valeur correct</div>
                   </div>
                   <div class="col-md-2 mb-3"></div>
               </div>
               <div class="form-row">
                   <div class="col-md-2 mb-3"></div>
                   <div class="col-md-8 mb-3">
                       <label for="validationCustom01">Le titre</label>
                       <input type="text" class="form-control" name="title" id="validationCustom01" required>
                       <div class="valid-feedback">
                           Looks good!
                       </div>
                   </div>
                   <div class="col-md-2 mb-3"></div>
               </div>
           </div>
       </div>
        <div class="row">
           <div class="col-md-5"></div>
            <div class="col-md-2 "><button class="btn btn-success w-100" type="submit">prêté le document </button></div>
            <div class="col-md-5"></div>
        </div>



    </form>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection