@extends('home1')

@section('content1')

    @if(count($abonner)==0)
        <strong> abonner n'exist pas</strong> <a href="/gotoeditAbonner" class="btn btn-secondary ml-lg-5 " >
            <i class="fa fa-share-square text-white mr-2"></i>go back</a>
        <br>
    @else

    @if ($errors->any())
        <div class="alert alert-danger">
            <h1 align="center">edite filed</h1>
        </div>
    @endif

    @foreach($abonner as $abo)
        <form  class="needs-validation" name="frm" action="/edit/{{$abo->id}}" method="post" novalidate>
            {{csrf_field()}}
            <fieldset>
                <legend ALIGN="center">
                    <strong>Modifier l'Abonner  " R°: {{$abo->num}}"  </strong>
                </legend>
                <br>
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> Numéro de carte </strong>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="{{$abo->num}}" name="num" required maxlength="15">
                        <div class="invalid-feedback">Please provide a valid first name</div>
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
                               maxlength="20" value="{{$abo->nom}}" name="nom" placeholder="le Nom" required>
                        <div class="invalid-feedback">Please provide a valid first name</div>
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
                               value="{{$abo->prenom}}" name="prenom" placeholder="le prénom" required><div class="invalid-feedback">Please provide a valid last name</div>
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
                        <div class="invalid-feedback">Please provide a valid email </div>
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
                        <div class="invalid-feedback"> Entre le numéro de telephone coorect  </div>
                        @error('telephone')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>
                </div>
                <!------------------------------------------------------------------- -->
                <br>
                <div id="bt">
                    <button class="btn btn-success w-10" type="submit">sauvegarder les  mofication</button>
                    <a href="/more/{{$abo->id}}" class="btn btn-secondary  " >cancel</a>
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
    @endif


@endsection