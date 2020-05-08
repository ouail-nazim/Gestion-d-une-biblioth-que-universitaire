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
        .retarde{
            background: #9fc1f0;
            background: -webkit-linear-gradient(to right, #ff7a32, #ff7367);
            background: linear-gradient(to right, #ff7a32, #ff7367);
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

    <div class="row">
        <div class="col-md-7"> <input type="text" class="form-control" maxlength="20" id="myInput" onkeyup="myFunction()" placeholder="Entré le non d'abonné" >
        </div>
        <div class="col-md-5">
            <button class="btn btn-secondary " style="width: 45%" onclick="filterSelection('all')"> tout</button>
            <button class="btn retarde ml-3 " style="width: 45%" onclick="filterSelection('retarde')"> réservation finir</button>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped " id="myTable">
            <thead class="thead-dark">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>telephone</th>
                <th>le titre de livre</th>
                <th>date fin de reservations</th>
            </tr>
            </thead>
            <tbody class="bg-light bod">
            @foreach($abonner as $abo)
                @if(($abo->reservation )!= null)
                    @foreach($abo->reservation as $reservation)
                            <tr class="filterDiv @if ($reservation->date_fin_reservations < \Carbon\Carbon::today()->toDateString() )retarde  @endif">
                                <td>{{$abo->nom}}</td>
                                <td>{{$abo->prenom}}</td>
                                <td>{{$abo->email}}</td>
                                <td>0{{$abo->telephone}}</td>
                                <td>{{$reservation->document->titre}}</td>
                                <td>{{$reservation->date_fin_reservations}}
                                @if ($reservation->date_fin_reservations < \Carbon\Carbon::today()->toDateString() )
                                    <a href="/supprimer_res/{{$reservation->id}}" class="btn btn-dark ml-5">supprimer</a>
                                @endif
                                </td>
                            </tr>

                    @endforeach
                @endif
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