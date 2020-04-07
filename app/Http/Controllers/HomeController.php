<?php

namespace App\Http\Controllers;

use App\Abonner;
use App\Categorie;
use App\Document;
use App\Exemplaire;
use App\Livre;
use App\Memoire;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $abonner=count(Abonner::all());
        $abonnerpen=count(Abonner::where('pen','=',true)->get());
        $abonnersimple=count(Abonner::where('privliger','=','simple')->get());
        $abonnerfan=count(Abonner::where('privliger','=','fan')->get());
        $abonnersuper=count(Abonner::where('privliger','=','superfan')->get());
        $document=count(Document::all());
        $livre=count(Livre::all());
        $mem=count(Memoire::all());
        $exem=count(Exemplaire::all());
        $exempret=count(Exemplaire::where('disponibilite','=',false)->get());
        $cat=count(Categorie::all());
        return view('index.index')->with(
           [
               "abonner"=>$abonner,
               "abonnerpen"=>$abonnerpen,
               "abonnersimple"=>$abonnersimple,
               "abonnerfan"=>$abonnerfan,
               "abonnersuper"=>$abonnersuper,
               "document"=>$document ,
               "livre"=>$livre ,
               "mem"=> $mem,
               "exem"=>$exem,
               "exempret"=>$exempret,
               "cat"=>$cat
           ]
        );
    }


}
