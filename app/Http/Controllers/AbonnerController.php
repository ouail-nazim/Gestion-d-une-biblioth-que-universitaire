<?php

namespace App\Http\Controllers;

use App\Abonner;
use Illuminate\Http\Request;

class AbonnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //see all abonner in bib
    public function index(){
        $abonner=Abonner::latest()->get();
        $tl=array('abonner'=>$abonner);
        return view('abonner.see_all',$tl);
    }
    //--------------------------------------------------------------
    //serche to abonner withe his nom or prenom or num
    public function searchAbonner(Request $request){
        $request->validate([
            'search'=>'required|max:20'
        ]);
        $input=request('search');
        $abonner=Abonner::where('nom','like',"%".$input."%")
            ->orWhere ('prenom','like',"%".$input."%")
            ->orwhere('num','=',$input)
            ->get();
        $tl=array('abonner'=>$abonner);
        return view('abonner.see_all',$tl);
    }
    //--------------------------------------------------------------
    //display the deatille of abooner
    public function more($id){
        $Abonner=Abonner::findorfail($id);
        $ar=Array('Abonner'=>$Abonner);
        return view('abonner.more',$ar);
    }
    //--------------------------------------------------------------
    //go to ajouter abonner
    public function create(){
        return view('abonner.addAbonner');
    }
    // add and save the user(abonner)
    public function store(Request $request){
        $request->validate([
            'num'=>'required|unique:abonners|numeric|max:999999999999999',
            'nom'=>'required|alpha|max:20',
            'prenom'=>'required|alpha|max:20',
            'gender'=>'required',//|exists:abonners,gender
            'telephone'=>'required |numeric|max:10 ',
            'email' => 'required|email|unique:abonners',
        ]);
        Abonner::create([
            'num'=>request('num'),
            'nom'=>request('nom'),
            'prenom'=>request('prenom'),
            'password'=>bcrypt(request('num')),
            'gender'=>request('gender'),
            'telephone'=>request('telephone'),
            'email'=>request('email')
        ]);
        return redirect('/See_all ');
    }
    //--------------------------------------------------------------
    //serche to abonner for delete him
    public function gotodeletAbonner(){
        return view('abonner.search_for_delet');
    }
    //finde the abooner and retern viwe for delete it
    public function deletAbonner(Request $request){
        $request->validate([
            'search'=>'required|numeric|max:999999999999999'
        ]);
        $input=request('search');
        $abonner=Abonner::where('nom','like',"%".$input."%")
            ->orWhere ('prenom','like',"%".$input."%")
            ->orwhere('num','=',$input)
            ->get();
        $tl=array('abonner'=>$abonner);
        return view('abonner.delet',$tl);
    }
    //delet the abonner
    public function delete($id ){
        $l=Abonner::findorfail($id);
        $l->delete();
        return redirect('/See_all');
    }
    //--------------------------------------------------------------
    //serche to abonner for edit his info
    public function gotoeditAbonner(){
        return view('abonner.search_for_edit');
    }
    //finde the abonner and returne a form withe his old value
    public function editAbonner(Request $request){
        $request->validate([
            'search'=>'required|numeric|max:999999999999999'
        ]);
        $input=request('search');
        $abonner=Abonner::where('num','=',$input)->get();
        $tl=array('abonner'=>$abonner);
        return view('abonner.edit',$tl);
    }
    public function editAbonner2($id){
        $abonner=Abonner::where('num','=',$id)->get();
        $tl=array('abonner'=>$abonner);
        return view('abonner.edit',$tl);
    }
    // up date an save the new inputs
    public function update(Request $request,$id){
                $request->validate([
                    'num'=>'required|numeric|max:999999999999999',
                    'nom'=>'required|alpha|max:20',
                    'prenom'=>'required|alpha|max:20',
                    'telephone'=>'required |numeric|max:10 ',
                    'email' => 'required|email',
                ]);
            //|unique:abonners , num , ' .$request->input('telephone').',telephone',
            $a=Abonner::findorfail($id);
            $a->num=$request->input('num');;
            $a->nom=$request->input('nom');
            $a->prenom=$request->input('prenom');
            $a->email=$request->input('email');
            $a->telephone=$request->input('telephone');
            $a->update();
            return redirect("/more/$id" );
    }
    //--------------------------------------------------------------
    public function gotopinaliserAbonner(){
        return view('abonner.search_for_pen');
    }
    public function pinaliserAbonner(Request $request){
        $request->validate([
            'search'=>'required|numeric|max:999999999999999'
        ]);
        $input=$request->get('search');
        $abonner=Abonner::where('num','=',$input)
            ->get();
        $tl=array('abonner'=>$abonner);
        return view('abonner.pen',$tl);
    }
    //pinaliser l'abonner et decrementer le grade
    public function pinaliser($id){
        $a=Abonner::find($id);
        $a->pen=true;
        if ($a->privliger == 'superfan'){
            $a->privliger='fan';
        }else{
            $a->privliger='simple';
        }
        $a->save();
        return redirect( "/more/$id");
    }
    //Depinaliser l'abonner
    public function Depinaliser($id){
        $a=Abonner::find($id);
        $a->pen=false;
        $a->save();
        return redirect('/See_all ');
    }
    //--------------------------------------------------------------
    public function gotoprivligerAbonner(){
        return view('abonner.search_for_priv');
    }
    public function privligerAbonner(Request $request){
        $request->validate([
            'search'=>'required|numeric|max:999999999999999'
        ]);
        $input=$request->get('search');
        $abonner=Abonner::where('num','=',$input)
            ->get();
        $tl=array('abonner'=>$abonner);
        return view('abonner.priv',$tl);
    }
    // priviliger abonner
    public function privliger($id){
        $a=Abonner::find($id);
        if ($a->privliger == 'simple'){
            $a->privliger='fan';
        }else{
            $a->privliger='superfan';
        }
        $a->save();
        return redirect( "/more/$id");

    }


}
