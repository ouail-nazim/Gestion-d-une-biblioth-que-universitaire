<?php

namespace App\Http\Controllers;

use App\Abonner;
use App\Categorie;
use App\Document;
use App\Emprunt;
use App\Exemplaire;
use App\Livre;
use App\Memoire;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Config;

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
        $total=Emprunt::all();
        $retarde=0;
        foreach ($total as $emprunt){
            if ($emprunt->date_retour < Carbon::today()->toDateString() ){
                $retarde++;
            }
        }
        Config::set('retarde',$retarde);
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
        //Exemplaire::where('disponibilite','=',false)->get()
        $total=Emprunt::all();
        $exempret=count($total);
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
               "cat"=>$cat,
           ]
        );
    }


}
