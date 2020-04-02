<?php

namespace App\Http\Controllers;

use App\Document;
use App\Livre;
use App\Tag;
use App\tag_livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }






}
