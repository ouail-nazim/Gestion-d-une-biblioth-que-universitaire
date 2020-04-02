
@extends('layouts.app')
@section('h')
@yield('head')
@endsection

@section('content')


    <div class="ta d-flex bd-highlight ">
        <div class="p-2 bd-highlight ">
            <div class="container ">
                <div class="row ">
                    <div class="col ">
                        <div class="vertical-nav ha ">
                            <nav class="navbar navbar-expand-lg navs flex-column">
                                <button class="navbar-toggler top" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="flex-column" id="navbarSupportedContent">

                                    <a class="navbar-brand text-light "  href="{{url('/home')}}"><img src="/storage/app/logo2.png"
                                                                                                     width="100%" height="120PX"></a>
                                    <br><br><br>
                                    <p class="nav-link disabled font-weight-bold text-uppercase text-light">geréé abonner</p>
                                    <ul class="nav flex-column  nav-pills ha mb-0 ">
                                        <li class="nav-item li">
                                            <a href="/See_all" class="nav-link text-light font-italic ">
                                                <i class="fa fa-eye-large mr-3  text-light fa fa-eye "></i>
                                                see all abonner
                                            </a>
                                        </li>
                                        <li class="nav-item li">
                                            <a href="/addAbonner" class="nav-link text-light font-italic ">
                                                <i class="fa fa-plus-large mr-3 text-light fa-plus"></i>
                                                ajouter un abonner
                                            </a>
                                        </li>
                                        <li class="nav-item li">
                                            <a href="/gotoeditAbonner" class="nav-link text-light font-italic ">
                                                <i class="fa fa-pencil-large mr-3 text-light fa fa-pencil"></i>
                                                modifier un abonner
                                            </a>
                                        </li>
                                        <li class="nav-item li">
                                            <a href="/gotodeletAbonner" class="nav-link text-light font-italic ">
                                                <i class="fa fa-bitbucket-large mr-3 text-light fa fa-bitbucket"></i>
                                                suprimer un abonner
                                            </a>
                                        </li>
                                        <li class="nav-item li">
                                            <a href="/gotopinaliserAbonner" class="nav-link text-light font-italic ">
                                                <i class="fa fa-minus-circle-large mr-3 text-light fa fa-minus-circle"></i>
                                                pinaliser un abonner
                                            </a>
                                        </li>
                                        <li class="nav-item li">
                                            <a href="/gotoprivligerAbonner" class="nav-link text-light font-italic ">
                                                <i class="fa fa-star-large mr-3 text-light fa fa-star"></i>
                                                privliger un abonner
                                            </a>
                                        </li>
                                    </ul>
                                    <br><br>
                                    <p class="nav-link disabled font-weight-bold text-uppercase text-light">geréé document</p>
                                    <ul class="nav flex-column  nav-pills ha  ">
                                        <li class="nav-item li">
                                            <a href="/create" class="nav-link text-light font-italic ">
                                                <i class="fa fa-plus-large mr-3 text-light fa-plus"></i>
                                                ajouter un Document
                                            </a>
                                        </li>
                                        <li class="nav-item li">
                                            <a href="/create?action=suprimer" class="nav-link text-light font-italic ">
                                                <i class="fa fa-bitbucket-large mr-3 text-light fa-bitbucket"></i>
                                                suprimer un livre
                                            </a>
                                        </li>
                                        <li class="nav-item li">
                                            <a href="/create?action=edit" class="nav-link text-light font-italic ">
                                                <i class="fa fa-pencil-large mr-3 text-light fa-pencil"></i>
                                                modifier un livre
                                            </a>
                                        </li>
                                    </ul>


                                </div>
                            </nav>
                        </div>

                    </div>


                </div>
            </div>
        </div>
        <div class="p-2 flex-grow-1 bd-highlight content1">

            @yield('content1')


        </div>


    </div>

@endsection


