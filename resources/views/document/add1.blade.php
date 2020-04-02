@extends('home1')

@section('content1')
    <div class="row t1">
        <a class="ajout aj1" href="/create?type=livre">
            <h2 class="tete">ajouter livre</h2>
        </a>
        <a class=" ajout aj2" href="/create?type=memoire">
            <h2 class="tete">ajouter mémoire</h2>
        </a>
    </div>
@endsection