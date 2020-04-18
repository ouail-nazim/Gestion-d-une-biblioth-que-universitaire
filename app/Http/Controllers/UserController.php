<?php

namespace App\Http\Controllers;

use App\Abonner;
use App\Categorie;
use App\Document;
use App\Livre;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserHome(){
            $doc=Document::all();
            $cat=Categorie::all();
            return view('user.index')->with(['doc'=>$doc,'cat'=>$cat]);
    }
    public function About(){
        return view('user.generic');
    }
    public function UserLogin(){
        return view('user.login');
    }
    public function getlivre(Request $request){
        $request->validate([
            'serch'=>'required|max:20'
        ]);
        $input=\Request::get('serch');
        $doc=Document::where('titre','like','%'.$input.'%')->get();
        return view('user.index')->with(['doc'=>$doc]);
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
