@extends('index.dropdown')

@section('content1')

    @if($abonner=='hhhh')
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
        <strong>ooops!</strong> l'abonner rechercher  n'exist pas.
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
    @endif
    <form  class="needs-validation" name="frm" novalidate action="{{url("/editAbonner")}}" method="post"  role="search">
        {{csrf_field()}}
        <fieldset>
            <legend ALIGN="center">
                <strong>modifier abonner</strong>
            </legend>
            <!------------------------------------------------------------------- -->
            <br><br>
            <div class="form-row">
                <div class="col-md-3">
                    <strong> le numéro de cart </strong>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="search" maxlength="15"
                           placeholder="rechercher un abonner" aria-label="Search" required>
                    @error('search')
                    <div class="text-danger">{{ '!!!'. $message }}</div>
                    @enderror
                    <SCRIPT LANGUAGE="JavaScript">
                        document.forms.frm.nom.focus();
                    </SCRIPT>
                    <div class="invalid-feedback">Please provide a valid title</div>
                </div>
            </div>
            <!------------------------------------------------------------------- -->
            <br>
            <div id="bt">
                <button class="btn btn-primary" type="submit">Rechercher <i class="fa fa-search-large mr-1 text-white fa-search"></i> </button>
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
