<?php

namespace App\Http\Controllers;

use App\Abonner;
use App\Categorie;
use App\Document;
use App\Livre;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Config;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth:abonner');
        $abonners=Abonner::all();
        foreach ($abonners as $abonner){
            if ($abonner->date_depanaliser < Carbon::today()->toDateString() ){
                $abonner->date_depanaliser =null;
                $abonner->pen=false;
                $abonner->update();
            }
        }
        $res=\App\Reservation::all();
        //suprimé les réesrvation qanud la date de fin arivver
        foreach ($res as $reservation){
            if ($reservation->date_fin_reservations < \Carbon\Carbon::today()->toDateString() )
            {
                $reservation->delete();
            }
        }
        Config::set('msg',request('msg'));
    }
    //get home as auth
    public function UserHome(){
            $doc=Document::all();
            $cat=Categorie::all();
            $abonner=Abonner::findorfail(Auth::guard('abonner')->user()->id);
            $res=\App\Reservation::all();
            foreach ($res as $reservation){
                if ($reservation->date_fin_reservations < \Carbon\Carbon::today()->toDateString() )
                {
                    $reservation->delete();
                }
            }
            return view('user.index')->with(['doc'=>$doc,'cat'=>$cat,'abonner'=>$abonner]);
    }
    // search for a book as auth
    public function getlivre(Request $request){
        $request->validate([
            'serch'=>'required|max:20'
        ]);
        $input=\Request::get('serch');
        $doc=Document::where('titre','like','%'.$input.'%')->get();
        $cat=Categorie::all();
        $abonner=Abonner::findorfail(Auth::guard('abonner')->user()->id);
        return view('user.index')->with(['doc'=>$doc,'cat'=>$cat,'abonner'=>$abonner]);
    }
    //filtre the books as auth
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

        $abonner=Abonner::findorfail(Auth::guard('abonner')->user()->id);
        return view('user.index')->with(['doc'=>$docum,'cat'=>$cat,'abonner'=>$abonner]);

    }
    // get the prfile page
    public function profile($id){
        $Abonner=Abonner::findorfail($id);
        return view('user.profile')->with(['Abonner'=>$Abonner]);
    }
    //change the password
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
    //reserver livre
    public function  reserve_livre($code){
        $id_auth=Auth::guard('abonner')->user()->id;
        $doc=Document::where('code','=',$code)->first();
        $now = Carbon::today();
        $date_reservations=$now->toDateString();
        $date_fin_reservations=$now->addDays(7)->toDateString();

        $abonner=Abonner::findorfail($id_auth);
        if((count($abonner->reservation))==0){
            $reservation= new Reservation();
            $reservation->id_abo=$id_auth;
            $reservation->code_doc=$doc->code;
            $reservation->date_reservations=$date_reservations;
            $reservation->date_fin_reservations=$date_fin_reservations;
            $reservation->save();
        }
        return redirect('/userhome');


    }
    //anuller la reservation
    public function anuller_reserve($id){
        $id_abo=Reservation::findorfail($id)->id_abo;
        Reservation::findorfail($id)->delete();
        return redirect("/profile/$id_abo");

    }

}
