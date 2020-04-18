@extends('index.dropdown')

@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 5; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div class="form-row">' +
                                '<div class="col-md-12">' +
                                            '<a href="javascript:void(0);" class="remove_button col-md-2" style="position: absolute;margin-left: -13px;padding-top: 30px;">' +
                                                 '<img src="delet.png"width="25px"  />' +
                                            '</a>' +
                                            '<br>'+
                                            '<div class="form-row" style="margin-left: 16%">' +
                                                '<div class="col-md-6 "><input type="text" class="form-control"name="nom[]" placeholder="nom de lauteaur de livre" required><div class="invalid-feedback">Please provide a valid value </div></div>' +
                                                '<div class="col-md-6 "><input type="text" class="form-control"name="prenom[]" placeholder="prenom de lauteaur de livre" required><div class="invalid-feedback">Please provide a valid value </div></div>' +
                                            '</div>' +
                                '</div>' +

                            '</div>'; //New input field html
            var x = 1; //Initial field counter is 1
            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>
@endsection

@section('content1')
    <!-- BODY TAGS----------------------------------------------------------------- -->
    <form  class="needs-validation" name="frm" action="addlivre?type=livre" method="post" novalidate ENCTYPE="multipart/form-data">
        {{csrf_field()}}
        <fieldset>
            <legend ALIGN="center">
                <strong>Ajouter un livre </strong>
            </legend>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <h1 align="center">added filed</h1>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <br>
            <div class="form-row">
                <div class="col-md-6">
                    <input type="text" maxlength="10" class="form-control"  name="code" value="{{old('code')}}" placeholder="le code de livre" required>
                    <div class="invalid-feedback">Please provide a valid value </div>
                    @error('code')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control"  name="isbn" value="{{old('isbn')}}" placeholder="le ISBN de livre" required>
                    <div class="invalid-feedback">Please provide a valid value </div>
                    @error('isbn')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" name="titre" value="{{old('titre')}}"placeholder="le titre de livre" required>
                    <SCRIPT LANGUAGE="JavaScript">
                        document.forms.frm.nom.focus();
                    </SCRIPT>
                    @error('titre')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror
                    <div class="invalid-feedback">Please provide a valid title</div>
                </div>
                <div class="col-md-3">
                    <input type="number"   class="form-control" name="nmb_dex" min="0" value="{{old('nmb_dex')}}" placeholder="nombre d'exomplair" required>
                    <div class="invalid-feedback">Please provide a valid value </div>
                    @error('nmb_dex')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-3">
                    <strong> sélectionner une image </strong>
                    @if ($errors->any())
                        <br> <div class="text-danger">inseré une auter foit </div>
                    @endif
                </div>
                <div class="col-md-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" name="img" required>
                        <label class="custom-file-label" for="validatedCustomFile"></label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                    @error('img')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-3">
                    <strong> Auteur information </strong>
                    @if ($errors->any())
                        <br> <div class="text-danger">inseré une auter foit </div>
                    @endif
                </div>
                <div class="col-md-9">
                    <div class="field_wrapper">
                        <div class="form-row">
                            <div class="col-md-2 ">
                                <a href="javascript:void(0);" style="" class="add_button" title="Add field">
                                    <img src="add.png" width="35px"  />
                                </a>
                            </div>
                            <div class="col-md-5 ">
                                <input type="text" class="form-control"name="nom[]"
                                       placeholder="nom de lauteaur de livre" required>
                                <div class="invalid-feedback">Please provide a valid value </div>
                                @error('nom')
                                <div class="text-danger">{{ '!!!'. $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-5 ">
                                <input type="text" class="form-control"name="prenom[]"
                                       placeholder="prenom de lauteaur de livre" required>
                            <div class="invalid-feedback">Please provide a valid value </div>
                                @error('prenom')
                                <div class="text-danger">{{ '!!!'. $message }}</div>
                                @enderror
                        </div>
                        </div>
                    </div>

                </div>
            </div>
            <br>

            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control"  name="edition" value="{{old('edition')}}" placeholder="Edition" required>
                    <div class="invalid-feedback">Please provide a valid value </div>
                    @error('edition')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control"  name="emplacment" value="{{old('emplacment')}}" placeholder="emplacement" required>
                    <div class="invalid-feedback">Please provide a valid value </div>
                    @error('emplacment')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror
                </div>
            </div>
            <br><br>
            <div class="form-row">
                <div class="col-md-3">
                    <strong> le date d'edition </strong>
                </div>
                <div class="col-md-9">
                    <input type="date" name="annee" value="{{old('annee')}}" class="form-control"  required>
                    <div class="invalid-feedback">Please select one of those langages</div>
                    @error('annee')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-3">
                    <strong> catégorie </strong>
                </div>
                <div class="col-md-9">
                    <div class="row row-cols-5">

                        @foreach($cat=\App\Categorie::all() as $cm)
                            <div class="col">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="cat[]" value="{{$cm->name}}"
                                           class="custom-control-input" id="{{$cm->id}}">
                                    <label class="custom-control-label" for="{{$cm->id}}">{{$cm->name}}</label>
                                </div>
                                @error('tag')
                                <div class="text-danger">{{ '!!!'. $message }}</div>
                                @enderror
                            </div>
                        @endforeach
                    </div>




                </div>
            </div>
            <br>
            <div id="bt">
                <button class="btn btn-success" type="submit">ajouter</button>
                <button class="btn btn-danger ml-lg-5" type="RESET">annuler</button>
            </div>
            <div style="height: 25px;"></div>
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