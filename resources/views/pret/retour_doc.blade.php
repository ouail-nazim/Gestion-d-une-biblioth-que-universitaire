@extends('index.dropdown')
@section('content1')
    @if($msg)
        <div style=" padding: 20px;
          background-color: #f44336;
          color: white;
          opacity: 1;
          transition: opacity 0.6s;
          border-radius:7px;
          margin-bottom: 15px;">
          <span class="closebtn" style=" margin-left: 15px;
          color: white;
          font-weight: bold;
          float: right;
          font-size: 22px;
          line-height: 20px;
          cursor: pointer;
          transition: 0.3s;">&times;</span>
            <strong>ooops!</strong> {{$msg[0]}}.
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
        <br>
    @endif
    @if ($errors->any())
        <div style=" padding: 20px;
          background-color: #f44336;
          color: white;
          opacity: 1;
          transition: opacity 0.6s;
          border-radius:7px;
          margin-bottom: 15px;">
          <span class="closebtn" style=" margin-left: 15px;
          color: white;
          font-weight: bold;
          float: right;
          font-size: 22px;
          line-height: 20px;
          cursor: pointer;
          transition: 0.3s;">&times;</span>
            <strong>ooops!</strong> formulaire est mal rempli.
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
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
        </div>
    @endif


    <form class="needs-validation" method="post" action="/saveback" novalidate>
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="form-row">
                    <div class="col-md-2 mb-3"></div>
                    <div class="col-md-8 mb-3" style="text-align: center;" >
                        <img class=" " width="150px" height="150px" src="/atest.png"  height="200px" class="card-img-top" alt="...">

                    </div>
                    <div class="col-md-2 mb-3"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 mb-3"></div>
                    <div class="col-md-8 mb-3">
                        <label for="validationCustom01">Numéro de l'attestation</label>
                        <input type="number" min="0" class="form-control" name="atest" id="validationCustom01" required>
                        <div class="valid-feedback">
                            entré un numéro
                        </div>
                    </div>
                    <div class="col-md-2 mb-3"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 mb-3"></div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Le matricule d'etudient</label>
                        <input type="text" class="form-control" maxlength="10" name="num" id="validationCustom01" required>
                        <div class="valid-feedback">
                            entré un nom
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">LE code de document</label>
                        <input type="text" class="form-control" maxlength="15" name="code_doc" id="validationCustom01" required>
                        <div class="valid-feedback">
                            entré un prenom
                        </div>
                    </div>

                    <div class="col-md-2 mb-3"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 mb-3"></div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">LE numéro d'exemplaire </label>
                        <input type="number" min="0"  class="form-control"  name="num_exem" id="validationCustom01" required>
                        <div class="valid-feedback">
                            entré un prenom
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip04">L'Etat de l'exemplaire</label>
                        <select class="custom-select" name="etat" id="validationTooltip04" >
                            <option selected disabled >changer l'état aux ......</option>
                            <option value="90">Parfait</option>
                            <option value="80">Tres bon état</option>
                            <option value="70 ">Bon état</option>
                            <option value="60">Assez bon etat</option>
                            <option value="50">etat satisfaisant</option>
                            <option value="40">état passable</option>
                            <option value="30">mauvais état </option>
                            <option value="20">déchiré</option>


                        </select>
                        <div class="invalid-tooltip">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="col-md-2 mb-3"></div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 "><button class="btn btn-success w-100" type="submit">retournée le document  </button></div>
            <div class="col-md-4"></div>
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