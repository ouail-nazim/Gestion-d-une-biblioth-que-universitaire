<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>warble</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="shortcut icon" href="/images/hh.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/costum.css') }}" rel="stylesheet">

    <link href="/fontawesome/css/all.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <section class="px-8 py-2 ">
        <header class="container mx-auto flex justify-between ">
            <h3>
                <a href="/"><img src="/images/logo.png" alt="warble" width="100px" ></a>
            </h3>


        </header>
    </section>

    <div class="flex flex-row justify-center py-10 items-center">
        <div >
            <img src="/images/404.png" style="width: 450px;">
            <a style="width: 20%;margin: 5% 40%"
               @auth
               href="/home"
               @else
               href="/"
               @endauth
               class=" bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded-lg">
                go homei
            </a>
        </div>


    </div>


</div>
<script src="http://unpkg.com/turbolinks"></script>

</body>
</html>
