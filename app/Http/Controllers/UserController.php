<?php

namespace App\Http\Controllers;

use App\Abonner;
use App\Categorie;
use App\Document;
use App\Livre;
use Illuminate\Http\Request;
use Auth;
use Config;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth:abonner');
        Config::set('msg',request('msg'));
    }
    public function UserHome(){
            $doc=Document::all();
            $cat=Categorie::all();
            return view('user.index')->with(['doc'=>$doc,'cat'=>$cat]);
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
    public function profile($id){
        $Abonner=Abonner::findorfail($id);
        return view('user.profile')->with(['Abonner'=>$Abonner]);
    }
    public function changepassword(Request $request){
        $request->validate([
            'old'=>'required',
            'password'=>'required|min:3',
            'confirm_password'=>'required|min:3'
        ]);
        $id_auth=Auth::guard('abonner')->user()->id;
        $id=request('id');
        if ($id == $id_auth){
            if(Auth::guard('abonner')->attempt(
                [   'id' => request('id'),
                    'password' => request('old')
                ]))
            {
                if ((request('password'))==(request('confirm_password')))
                {
                        $abonner=Abonner::findorfail($id_auth);
                        $abonner->password=bcrypt(request('password'));
                        $abonner->update();
                        $msg=" mot de pass a etait changer ";
                        return redirect("/profile/$id?msg=$msg");
                }else{
                    //maché nafse el password
                    $msg="ooops!!!inseré le meme nv mot de pass";
                    return redirect("/profile/$id?msg=$msg");
                }
            }else{
                //l'encien incorect
                $msg="ooops!!!lencien mot de pass incorect";
                return redirect("/profile/$id?msg=$msg");
            }
        }else{
            //maché nafse el user
            $msg="ooops!!! impossible de changer le mot de pass d'un auter user";
            return redirect("/profile/$id?msg=$msg");
        }
    }

}
