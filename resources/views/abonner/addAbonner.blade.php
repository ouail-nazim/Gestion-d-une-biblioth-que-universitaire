@extends('index.dropdown')

@section('content1')
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
    <!-- BODY TAGS----------------------------------------------------------------- -->
    <form  class="needs-validation" name="frm" action="addAbonner" method="post" novalidate>
        {{csrf_field()}}
        <fieldset>
            <legend ALIGN="center">
                <strong>Ajouter un Abonner </strong>
            </legend>
            <!--------------------------------------------------------------------->
            <br>
            {{--nom et prenom --}}
            <div class="form-row">
                <div class="col">
                       <input type="text" class="form-control "
                              maxlength="20" value="{{old('nom')}}" name="nom" pattern="([^\s][A-z\s]+)" placeholder="le Nom" required>
                       <SCRIPT LANGUAGE="JavaScript">
                           document.forms.frm.nom.focus();
                       </SCRIPT>
                       <div class="invalid-feedback">entrer une valeur correct</div>
                    @error('nom')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror


                </div>
                <div class="col" >
                    <input type="text" class="form-control" maxlength="20"
                           value="{{old('prenom')}}" name="prenom" pattern="([^\s][A-z\s]+)" placeholder="le prénom" required>
                    <div class="invalid-feedback">entrer une valeur correct</div>
                    @error('prenom')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror

                </div>
            </div>
            <br>
            {{--num--}}
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control"  value="{{old('num')}}"
                           name="num" placeholder="Entre le numéro d'Abonneé" required maxlength="15">
                    <div class="invalid-feedback"> entrer une valeur correct</div>
                    @error('num')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            {{--email--}}
            <div class="form-row">
                <div class="col">
                    <input type="email" class="form-control" value="{{old('email')}}"
                           name="email" placeholder="EMAIL" required>
                    <div class="invalid-feedback">entrer une valeur correct</div>
                    @error('email')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror

                </div>
            </div>
            <br>
            {{--gander--}}
            <div class="form-row">
                <div class="col-md-1 ">
                    <strong>gender</strong>
                </div>
                    <div class="custom-control custom-switch">
                        <input type="radio" name="gender" value="homme" checked class="custom-control-input" id="homme">
                        <label class="custom-control-label" for="homme">homme</label>
                    </div>
                    <div style="margin-left: 10px;" class="custom-control custom-switch">
                        <input type="radio" name="gender" value="femme" class="custom-control-input" id="femme">
                        <label class="custom-control-label" for="femme">femme</label>
                    </div>
            </div>
            <br>
            {{--tel--}}
            <div class="form-row">
                <div class="col">
                    <input type="text" maxlength="10" min="0" class="form-control" value="{{old('telephone')}}"
                           name="telephone" placeholder="Entre le numéro telephone" required>
                    <div class="invalid-feedback"> entrer une valeur correct </div>
                    @error('telephone')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror

                </div>
            </div>
            <!------------------------------------------------------------------- -->
            <br>
            <div id="bt" >
                <button class="btn btn-success w-25 mr-4" type="submit">Ajouter</button>
                <a href="/See_all"  class="btn btn-danger  " >annuler</a>
            </div>
            <!------------------------------------------------------------------- -->
        </fieldset>
    </form>
    <!-- SCRIPT TAGS----------------------------------------------------------------- -->
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