@extends('home1')
@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 5; //Input fields increment limitation
            var minField = 1;
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper

            var addButton2 = $('.add_button2'); //Add button selector
            var wrapper2 = $('.field_wrapper2'); //Input field wrapper

            var fieldHTML = '<div class="form-row" >' +
                '<div class="col-md-12">' +
                '<a href="javascript:void(0);" class="remove_button col-md-2" style="position: absolute;margin-left: -13px;padding-top: 30px;">' +
                '<img src="/delet.png"width="25px"  />' +
                '</a>' +
                '<br>'+
                '<div class="form-row" style="margin-left: 14.5%">' +
                '<div class="col-md-6 "><input type="text" class="form-control"name="nom[]" placeholder="nom de lauteaur de livre" required><div class="invalid-feedback">Please provide a valid value </div></div>' +
                '<div class="col-md-6 "><input type="text" class="form-control"name="prenom[]" placeholder="prenom de lauteaur de livre" required><div class="invalid-feedback">Please provide a valid value </div></div>' +
                '</div>' +
                '</div>' +
                '</div>'; //New input field html

            var fieldHTML2 = '<div class="form-row">' +
                '<div class="col-md-12">' +
                '<a href="javascript:void(0);" class="remove_button col-md-2" style="position: absolute;margin-left: -13px;padding-top: 30px;">' +
                '<img src="/delet.png"width="25px"  />' +
                '</a>' +
                '<br>'+
                '<div class="form-row" style="margin-left: 16%">' +
                '<div class="col-md-6 "><input type="text" class="form-control"name="nom1[]" placeholder="nom de lencadreure de livre" required><div class="invalid-feedback">Please provide a valid value </div></div>' +
                '<div class="col-md-6 "><input type="text" class="form-control"name="prenom1[]" placeholder="prenom de lencadreure de livre" required><div class="invalid-feedback">Please provide a valid value </div></div>' +
                '</div>' +
                '</div>' +
                '</div>';
            var x = 1;
            var y = 1;//Initial field counter is 1
            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });
            $(addButton2).click(function(){
                //Check maximum number of input fields
                if(y < maxField){
                    y++; //Increment field counter
                    $(wrapper2).append(fieldHTML2); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                if (x>minField){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
                }
            });
            $(wrapper2).on('click', '.remove_button', function(e){
                if (y>minField){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                y--; //Decrement field counter
                }
            });
        });
    </script>
@endsection
@section('content1')
    <!-- BODY TAGS----------------------------------------------------------------- -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <h1 align="center">edit filed</h1>
        </div>
    @endif
    @if(($doc->livre)!= null)
        <form  class="needs-validation" name="frm" action="/updateLivre/{{$doc->code}}" method="post" novalidate>
            {{csrf_field()}}
            <fieldset>
                <legend ALIGN="center">
                    <strong>Modifier le livre " R ://{{$doc->code}}/  "  </strong>
                </legend>
                <!------------------------------------------------------------------- -->
                <br>
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> titel </strong>
                    </div>
                    <div class="col-md-9">
                        <input type="text" value="{{$doc->titre}}" class="form-control" name="titre" placeholder="le titre de livre" required maxlength="30">
                        <SCRIPT LANGUAGE="JavaScript">
                            document.forms.frm.nom.focus();
                        </SCRIPT>
                        <div class="invalid-feedback">Please provide a valid title</div>
                        @error('titre')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> isbn </strong>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  value="{{$doc->livre->isbn}}" name="isbn" placeholder="le ISBN de livre" required>
                        <div class="invalid-feedback">Please provide a valid value </div>
                        @error('isbn')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> auteaur</strong>
                    </div>
                    <div class="col-md-9 hh">
                        <div class="field_wrapper">
                            <div class="form-row">
                                <div class="col-md-1 " style="z-index: 1;">
                                    <a href="javascript:void(0);" style=""class="add_button" title="Add field">
                                        <img src="/add.png" width="35px"  />
                                    </a>
                                </div>
                                    <div style="margin-top: -4.5%;margin-bottom: -3%" class="form-row  w-100 ">
                                        @foreach($doc->auteur as $auteurs )
                                        <div class="form-row  w-100 " >
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-10 ">
                                                <a href="javascript:void(0);" style="margin-left: -10%;" class="remove_button col-md-2" >
                                                    <img src="/delet.png"width="25px"  />
                                                    </a>
                                                <br>
                                                <div class="form-row " style="margin-top: -4%;margin-bottom: 3%">
                                                    <div class="col-md-6 "><input type="text" class="form-control"name="nom[]" value="{{$auteurs->nom}}" placeholder="nom de lauteaur de livre" required><div class="invalid-feedback">Please provide a valid value </div></div>
                                                    <br>
                                                    <div class="col-md-6 "><input type="text" class="form-control"name="prenom[]" value="{{$auteurs->prenom}}" placeholder="prenom de lauteaur de livre" required><div class="invalid-feedback">Please provide a valid value </div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> edition </strong>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="{{$doc->livre->edition}}" name="edition" placeholder="Edition" required>
                        <div class="invalid-feedback">Please provide a valid value </div>
                        @error('edition')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> nombre d'exomplair </strong>
                    </div>
                    <div class="col-md-9">
                        <input type="number"   class="form-control" name="nmb_dex" value="{{($doc->nmb_dex)}}"  min="0" placeholder="nombre d'exomplair" required>
                        <div class="invalid-feedback">Please provide a valid value </div>
                        @error('nmb_dex')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> emplacement </strong>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="{{($doc->emplacment)}}"  name="emplacment" placeholder="emplacement" required>
                        <div class="invalid-feedback">Please provide a valid value </div>
                        @error('emplacment')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> le date d'edition </strong>
                    </div>
                    <div class="col-md-9">
                        <input type="date" name="annee" value="{{($doc->annee)}}" class="form-control"  required>
                        <div class="invalid-feedback">Please select one of those langages</div>
                        @error('annee')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>

                </div>
                <!------------------------------------------------------------------- -->
                <br>
                <div id="bt">
                    <button class="btn btn-success" type="submit">Save mofication</button>

                </div>
                <!------------------------------------------------------------------- -->

            </fieldset>
        </form>
    @else
        <form  class="needs-validation" name="frm" action="/updateMemoire/{{$doc->code}}" method="post" novalidate>
            {{csrf_field()}}
            <fieldset>
                <legend ALIGN="center">
                    <strong>Modifier la Mémoire " R ://{{$doc->code}}/ "  </strong>
                </legend>
                <!------------------------------------------------------------------- -->
                <br>
                {{--titel--}}
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> titel </strong>
                    </div>
                    <div class="col-md-9">
                        <input type="text" value="{{$doc->titre}}" class="form-control" name="titre" placeholder="le titre de livre" required>
                        <SCRIPT LANGUAGE="JavaScript">
                            document.forms.frm.nom.focus();
                        </SCRIPT>
                        <div class="invalid-feedback">Please provide a valid title</div>
                        @error('titre')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                {{--promotion--}}
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> promotion </strong>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  value="{{$doc->memoire->promotion}}" name="promotion" placeholder="le ISBN de livre" required>
                        <div class="invalid-feedback">Please provide a valid value </div>
                        @error('promotion')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror

                    </div>
                </div>
                <br>
                {{--auteaur--}}
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> auteaur</strong>
                    </div>
                    <div class="col-md-9 hh">
                        <div class="field_wrapper">
                            <div class="form-row">
                                <div class="col-md-1 " style="z-index: 1;">
                                    <a href="javascript:void(0);" style=""class="add_button" title="Add field">
                                        <img src="/add.png" width="35px"  />
                                    </a>
                                </div>
                                <div style="margin-top: -4.5%;margin-bottom: -3%" class="form-row  w-100 ">
                                    @foreach($doc->auteur as $auteurs )
                                        <div class="form-row  w-100 " >
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-10 ">
                                                <a href="javascript:void(0);" style="margin-left: -10%;" class="remove_button col-md-2" >
                                                    <img src="/delet.png"width="25px"  />
                                                </a>
                                                <br>
                                                <div class="form-row " style="margin-top: -4%;margin-bottom: 3%">
                                                    <div class="col-md-6 "><input type="text" class="form-control"name="nom[]" value="{{$auteurs->nom}}" placeholder="nom de lauteaur de livre" required><div class="invalid-feedback">Please provide a valid value </div></div>
                                                    <br>
                                                    <div class="col-md-6 "><input type="text" class="form-control"name="prenom[]" value="{{$auteurs->prenom}}" placeholder="prenom de lauteaur de livre" required><div class="invalid-feedback">Please provide a valid value </div></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                {{--encadreure--}}
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> encadreure</strong>
                    </div>
                    <div class="col-md-9 hh">
                        <div class="field_wrapper2">
                            <div class="form-row">
                                <div class="col-md-1 " style="z-index: 1;">
                                    <a href="javascript:void(0);" style=""class="add_button2" title="Add field">
                                        <img src="/add.png" width="35px"  />
                                    </a>
                                </div>
                                <div style="margin-top: -4.5%;margin-bottom: -3%" class="form-row  w-100 ">
                                    @foreach($doc->memoire->encadreure as $encadreures)
                                        <div class="form-row  w-100 " >
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-10 ">
                                                <a href="javascript:void(0);" style="margin-left: -10%;" class="remove_button col-md-2" >
                                                    <img src="/delet.png"width="25px"  />
                                                </a>
                                                <br>
                                                <div class="form-row " style="margin-top: -4%;margin-bottom: 3%">
                                                    <div class="col-md-6 "><input type="text" class="form-control"name="nom1[]" value="{{$encadreures->nom}}" placeholder="nom de lauteaur de livre" required><div class="invalid-feedback">Please provide a valid value </div></div>
                                                    <br>
                                                    <div class="col-md-6 "><input type="text" class="form-control"name="prenom1[]" value="{{$encadreures->prenom}}" placeholder="prenom de lauteaur de livre" required><div class="invalid-feedback">Please provide a valid value </div></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                {{--nombre d'exomplair--}}
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> nombre d'exomplair </strong>
                    </div>
                    <div class="col-md-9">
                        <input type="number"   class="form-control" name="nmb_dex" value="{{($doc->nmb_dex)}}" min="0" placeholder="nombre d'exomplair" required>
                        <div class="invalid-feedback">Please provide a valid value </div>
                        @error('nmb_dex')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                {{--emplacement--}}
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> emplacement </strong>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="{{($doc->emplacment)}}"  name="emplacment" placeholder="emplacement" required>
                        <div class="invalid-feedback">Please provide a valid value </div>
                        @error('emplacment')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                {{--le date d'edition--}}
                <div class="form-row">
                    <div class="col-md-3">
                        <strong> le date d'edition </strong>
                    </div>
                    <div class="col-md-9">
                        <input type="date" name="annee" value="{{($doc->annee)}}" class="form-control"  required>
                        <div class="invalid-feedback">Please select one of those langages</div>
                        @error('annee')
                        <div class="text-danger">{{ '!!!'. $message }}</div>
                        @enderror
                    </div>

                </div>
                <!------------------------------------------------------------------- -->
                <br>
                <div id="bt">
                    <button class="btn btn-success" type="submit">Save mofication</button>

                </div>
                <!------------------------------------------------------------------- -->

            </fieldset>
        </form>
    @endif
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