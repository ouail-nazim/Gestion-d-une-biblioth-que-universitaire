<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abonner;
use App\Categorie;
use App\Document;
use App\Livre;
use Auth;

class userLogin extends Controller
{
    public function UserLogin(){
        return view('user.login');
    }
    public function index(){
        if( (Auth::guard('web')->user()) != null){
            return redirect('/home');
        }
        if( (Auth::guard('abonner')->user()) != null){
            return redirect('/userhome');
        }
        $doc=\App\Document::all();
        $cat=\App\Categorie::all();
        $res=\App\Reservation::all();
        foreach ($res as $reservation){
            if ($reservation->date_fin_reservations < \Carbon\Carbon::today()->toDateString() )
            {
                $reservation->delete();
            }
        }
        return view('user.index')->with(['doc'=>$doc,'cat'=>$cat]);
    }
    public function Login(){
        if(Auth::guard('abonner')->attempt(
            [   'num' => request('num'),
                'email' => request('email'),
                'password' => request('password')
            ]
        )
        )
        {

            return redirect()->intended('/userhome');
        }
        return redirect()->back();
    }
    public function About(){
        return view('user.generic');
    }
    public function getlivre(Request $request){
        $request->validate([
            'serch'=>'required|max:20'
        ]);
        $input=\Request::get('serch');
        $doc=Document::where('titre','like','%'.$input.'%')->get();
        $cat=Categorie::all();
        return view('user.index')->with(['doc'=>$doc,'cat'=>$cat]);
    }
    public function filtre (){

        if ((request('cat'))!=0){
            if ((request('cat'))!=null){
                $categorie=\App\Categorie::findorfail(request('cat'));
                $doc =$categorie->documents;
            }
        }else{
            $doc=Document::all();
        }
        if (request('type')=='all'){
            $docum=$doc;
        }
        else{
            if (request('type')=='livre'){
                $livres=array();
                foreach($doc as $doccument){
                    if(($doccument->livre)!= null){
                        $livres[]=$doccument;
                    }
                }
                $docum=$livres;
            }else{
                $memoire=array();
                foreach($doc as $doccument){
                    if(($doccument->livre)== null){
                        $memoire[]=$doccument;
                    }
                }
                $docum=$memoire;
            }
        }

        $cat=Categorie::all();
        return view('user.index')->with(['doc'=>$docum,'cat'=>$cat]);

    }
}
