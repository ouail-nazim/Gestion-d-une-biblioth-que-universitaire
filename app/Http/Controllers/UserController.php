<?php

namespace App\Http\Controllers;

use App\Abonner;
use App\Livre;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function gest(){
        $livres=Livre::all();
        $l=array('livres'=>$livres);
        $abonner=Abonner::where('num','=','')->paginate();
        $tl=array('abonner'=>$abonner);
        return view('user.index2',$l,$tl);

    }
    public function home(Request $request){
        $input=\Request::get('num');
        $input2=\Request::get('nom');
        $request->validate(['num' => 'required', 'nom' => 'required']);
        $abonner=Abonner::where([
            ['num', '=', $input],
            ['nom', '=', $input2],
        ])->get();

        $tl=array('abonner'=>$abonner);
        $livres=Livre::all();
        $l=array('livres'=>$livres);
        if(count($abonner)==0){
            return redirect('/');
        }
        else{
            return view('user.index2',$tl,$l);
        }
    }

}
