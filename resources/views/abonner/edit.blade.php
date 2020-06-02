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

    @foreach($abonner as $abo)
        <form  class="needs-validation" name="frm" action="/edit/{{$abo->id}}" method="post" novalidate>
            {{csrf_field()}}
            <fieldset>
                <legend ALIGN="center">
                    <strong>Modifier l'Abonner  " N°: {{$abo->num}}"  </strong>
                </legend>
                <br>
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> Numéro de carte </strong>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="{{$abo->num}}" name="num" required maxlength="15">
                        <div class="invalid-feedback">entrer une valeur correct</div>
                        @error('num')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> Nom </strong>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control "
                               maxlength="20" value="{{$abo->nom}}" pattern="([^\s][A-z\s]+)" name="nom" placeholder="le Nom" required>
                        <div class="invalid-feedback">entrer une valeur correct</div>
                        @error('nom')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> prenom</strong>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" maxlength="20"
                               value="{{$abo->prenom}}" name="prenom" placeholder="le prénom" pattern="([^\s][A-z\s]+)" required>
                        <div class="invalid-feedback">entrer une valeur correct</div>
                        @error('prenom')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> @Email</strong>
                    </div>
                    <div class="col-md-9">
                        <input type="email" class="form-control" value="{{$abo->email}}"
                               name="email" placeholder="EMAIL" required>
                        <div class="invalid-feedback">entrer une valeur correct</div>
                        @error('email')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> télephone</strong>
                    </div>
                    <div class="col-md-9">
                        <input type="text" maxlength="10" min="0" class="form-control" value="{{"0".$abo->telephone}}"
                               name="telephone" required>
                        <div class="invalid-feedback">entrer une valeur correct </div>
                        @error('telephone')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>
                </div>
                <!------------------------------------------------------------------- -->
                <br>
                <div id="bt">
                    <button class="btn btn-success w-10" type="submit">sauvegarder les  mofication</button>
                    <a href="/more/{{$abo->id}}" class="btn btn-secondary  " >anuller</a>
                </div>
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

                @endforeach


@endsection