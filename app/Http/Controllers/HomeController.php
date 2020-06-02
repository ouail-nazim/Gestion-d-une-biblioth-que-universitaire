<?php

namespace App\Http\Controllers;

use App\Abonner;
use App\Categorie;
use App\Document;
use App\Emprunt;
use App\Exemplaire;
use App\Livre;
use App\Memoire;
use App\Reservation;
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
        $abonners=Abonner::all();
        foreach ($abonners as $abonner){
            if ($abonner->date_depanaliser < Carbon::today()->toDateString() ){
                $abonner->date_depanaliser =null;
                $abonner->pen=false;
                $abonner->update();
            }
        }
        $total=Emprunt::all();
        $retarde=0;
        $death=0;
        foreach ($total as $emprunt){
            if ($emprunt->date_retour < Carbon::today()->toDateString() ){
                $retarde++;
            }
        }
        $res=\App\Reservation::all();
        //suprimé les réesrvation qanud la date de fin arivver
        foreach ($res as $reservation){
            if ($reservation->date_fin_reservations < \Carbon\Carbon::today()->toDateString() )
            {
                $death++;
                //$reservation->delete();
            }
        }
        Config::set('retarde',$retarde);
        Config::set('death',$death);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(){
        $abonner=count(Abonner::all());
        $abonnerpen=count(Abonner::where('pen','=',true)->get());
        $abonnersimple=count(Abonner::where('privliger','=','simple')->get());
        $abonnerfan=count(Abonner::where('privliger','=','fan')->get());
        $abonnersuper=count(Abonner::where('privliger','=','superfan')->get());
        $document=count(Document::all());
        $livre=count(Livre::all());
        $mem=count(Memoire::all());
        $exem=count(Exemplaire::all());
        $exempret=count(Emprunt::all());
        $reservation=count(Reservation::all());
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
               "reservation"=>$reservation
           ]
        );
    }


}
