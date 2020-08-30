@extends('index.dropdown')
@section('head')
    <style type="text/css">
        #myInput {
            margin-left: 2%;
            font-size: 16px; /* Increase font-size */
            padding: 12px 20px 12px 40px; /* Add some padding */
            margin-bottom: 12px; /* Add some space below the input */
        }
        #myTable{
            width: 100%;
        }
        td{
            border-bottom: 1px solid black;
        }
        .filterDiv {
            display: none;
        }
        .show {
            display:table-row; ;
        }
    </style>

@endsection
@section('content1')

               @error('name_cat')
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
                        <strong>ooops!</strong> {{$message }}.
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

                @enderror

        @if ($errors->any())

        @endif

    <div class="row">
        <div class="col-md-6"> <input type="text" class="form-control" maxlength="20" id="myInput" onkeyup="myFunction()" placeholder="le nome de catégori." >
        </div>
        <div class="col-md-6">
            <button class="btn btn-dark " style="width: 40%" onclick="filterSelection('all')"> tout</button>
            <button class="btn btn-dark ml-3 " style="width: 40%" onclick="filterSelection('vide')"> catégori vide</button>
            <button class="btn"  onclick="document.getElementById('id03').style.display='block'" ><img src="add.png" width="35px"  /></button>
            <div id="id03" class="modal">
                <div class="modal-content animate" >
                    <span class="" style="text-align: center ; font-size: 2em;"><strong>Ajouter une catégorie</strong> </span>
                    <form method="post" action="/addcategori" class="needs-validation" name="cat">
                        @csrf
                        <input type="text" class="form-control bb" maxlength="20" autofocus
                               name="name_cat" pattern="([^\s][A-z\s]+)" value="{{old('name_cat')}}" placeholder="le nom de categori" required>
                        <SCRIPT LANGUAGE="JavaScript">
                            document.forms.cat.name_cat.focus();
                        </SCRIPT>
                        <div class="invalid-feedback">Please provide a valid last name</div>


                        <button class="bb btn btn-success"  type="submit">Ajouter</button>

                    </form>
                    <button class="bb btn btn-danger" id="can2">Annuler</button>
                </div>
            </div>
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
            <script>
                // Get the modal
                var modal3 = document.getElementById('id03');
                var can = document.getElementById('can2');
                can.onclick=function () {
                    modal3.style.display = "none";
                }
            </script>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped " id="myTable">
            <thead class="thead-dark">
            <tr>
                <th>Nom de la catégorie</th>
                <th>Nombre de documents dans cette catégorie</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="bg-light bod">
            @foreach($cat as $catégori)

                        <tr class="filterDiv @if ((count($catégori->documents))==0) vide  @endif">
                            <td>{{$catégori->name}} </td>
                            <td>{{count($catégori->documents)}}</td>
                            <td>
                                <a class=" mr-2 btn btn-dark @if ((count($catégori->documents))==0) ml-0 disabled @endif"
                                   href="/indexdoc?cate={{$catégori->id}}">
                                    Documents de cette catégorie
                                </a>
                            </td>
                        </tr>

            @endforeach


            </tbody>
        </table>
        <script>
            filterSelection("all")
            function filterSelection(c) {
                var x, i;
                x = document.getElementsByClassName("filterDiv");
                if (c == "all") c = "";
                for (i = 0; i < x.length; i++) {
                    w3RemoveClass(x[i], "show");
                    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
                }
            }

            function w3AddClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
                }
            }

            function w3RemoveClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    while (arr1.indexOf(arr2[i]) > -1) {
                        arr1.splice(arr1.indexOf(arr2[i]), 1);
                    }
                }
                element.className = arr1.join(" ");
            }

        </script>

        <script type="text/javascript">
            function myFunction() {
                // Declare variables
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }

        </script>




@endsection
