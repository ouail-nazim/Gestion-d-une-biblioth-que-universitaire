<?php

namespace App\Http\Controllers;

use App\Auteur;
use App\Categorie;
use App\categorie_document;
use App\Document;
use App\Emprunt;
use App\Encadreure;
use App\Exemplaire;
use App\Livre;
use App\Memoire;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Config;

class DocumentControler extends Controller
{
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
    //--------------------------------------------------------------
    // see all document or the documents of a categorie
    public function index()
    {
        if (request('cate')){
            $categorie=\App\Categorie::findorfail(request('cate'));
            $doc =$categorie->documents;
        }else{
            $doc=Document::all();
        }
        return view('home')->with(['doc'=>$doc,'action'=>'index']);

    }
    //--------------------------------------------------------------
    //rechercher sur un document avec le titre ou le code de document
    public function searchdoc(Request $request){
        $request->validate([
            'search'=>'required|max:20'
        ]);
        $input=\Request::get('search');
        $doc=Document::where('code','like',$input)
            ->orWhere('titre','like','%'.$input.'%')
            ->get();
        return view('home')->with(['doc'=>$doc,'action'=>'index']);
    }
    //--------------------------------------------------------------
    //afficher les des datille d'un document
    public function show($code)
    {
        $doc=Document::find($code);
        $nombre_ex=count($doc->exemplaire);
        return view('document.showdoc')->with(['doc'=>$doc,'nombre_ex'=>$nombre_ex]);

    }
    //nombre dexemplaire +1 AJouter in exe
    public function explus($code)
    {
        $doc=Document::find($code);
        $i=count($doc->exemplaire)+1;

        $exem=new Exemplaire();
        $exem->identif=$i;
        $exem->code_doc=$doc->code;
        $exem->save();

        $doc->nmb_dex=$i;
        $doc->update();
        return redirect("/detailebook/$doc->code");
    }
    //nombre dexemplaire -1 si il est plus de 0
    public function exmoin($code,Request $request)
    {
        $this->validate($request,[
            'id'=>'required|numeric',
        ]);
        $identif=request('id');
        $E1=Exemplaire::where([
            ['identif', '=', $identif],
            ['code_doc', '=', $code],
        ])->first();
        if (!empty($E1)){
        $E1->delete();
        $doc=Document::where('code','=',$code)->first();
        $doc->nmb_dex=($doc->nmb_dex)-1;
        $doc->update();
        }
        return redirect("/detailebook/$code");
    }
    //--------------------------------------------------------------
    //go to ajouter document soit livre ou mémoire
    //aficher la form de racherche pour suprimer ou modifier
    public function create()
    {
        if (request('type')=='livre'){
            return view('document.addlivre');
        }
        if (request('type')=='memoire'){
            return view('document.addmemoire');
        }
        if (request('action')=='suprimer'){
            return view('document.searche',['action'=>'suprimer']);
        }
        if (request('action')=='edit'){
            return view('document.searche',['action'=>'edit']);
        }
        return view('document.add1');
    }
    //save les information des documents
    public function store(Request $request)
    {
        //virifier les inputs
        $this->validate($request,[
            'img'=>'image|required|mimes:png,jpg,jpeg,gif',
            'cat'=>'exists:categories,name',
            'code'=>'required|max:10|unique:documents',
            'titre'=>'required|max:30',
            'nmb_dex'=>'required|numeric|min:0',
            'nom'=>'required|max:20',
            'prenom'=>'required|max:20',
            'emplacment'=>'required|max:30',
            'annee'=>'required|date'
        ]);
        if (request('type')=='livre'){
            $this->validate($request,[
                'isbn'=>'required|numeric',
                'edition'=>'required|max:30',
            ]);
        }
        if (request('type')=='memoire'){
            $this->validate($request,[
                'promotion'=>'required',
                'prenom1'=>'required|max:30',
                'nom1'=>'required|max:30'
            ]);

        }
        //ajouter le document
        $doc1=new Document();
        $doc1->code=request('code');
        $doc1->titre=request('titre');
        $doc1->annee=request('annee');
        $doc1->nmb_dex=request('nmb_dex');
        $doc1->emplacment=request('emplacment');
        if ($request ->hasFile('img')){
            $image=$request->file('img');
            $extention=$image->getClientOriginalExtension();
            $image_name=time().'.'.$extention;
            $image->move('storage/books/',$image_name);
            $doc1->img=$image_name;
        }else{
            return $request;
            $doc1->img='';
        }
        $doc1->save();
        //ajouter les exemplaire
        for ($i=1;$i<=request('nmb_dex');$i++){
            $exem=new Exemplaire();
            $exem->identif=$i;
            $exem->code_doc=$doc1->code;
            $exem->save();
        }
        //ajouter les categorie pour ce document
        $cat=$request->input('cat');
        if(!$cat==null){
            foreach ($cat as $c){
                $categorie=Categorie::where('name','=',$c)->get();
                foreach($categorie as $cat){
                    $tl=new categorie_document();
                    $tl->categorie_id=$cat->id;
                    $tl->document_code=$doc1->code;
                    $tl->save();
                }
            }
        }
        //ajouter l'Auteur de document
        $prenoms=request('prenom');
        $noms=request('nom');
        $c=0;
        while ($c <count($noms)){
            $aut=new Auteur();
            $aut->nom=$noms[$c];
            $aut->prenom=$prenoms[$c];
            $aut->code_doc=$doc1->code;
            $aut->save();
            $c++;
        }
        //ajouter ce document comme livre
        if (request('type')=='livre'){
            $this->livre($doc1,$request);
        }
        if (request('type')=='memoire'){
            $this->memoire($doc1,$request);
        }
        return redirect('/indexdoc ');
    }
    public function livre(Document $doc1){
        $liv1=new Livre();
        $liv1->edition=request('edition');
        $liv1->isbn=request('isbn');
        $liv1->code_doc=$doc1->code;
        $liv1->save();
    }
    public function memoire(Document $doc1){
        $mem1=new Memoire();
        $mem1->promotion=request('promotion');
        $mem1->code_doc=$doc1->code;
        $mem1->save();
        $prenoms1=request('prenom1');
        $noms1=request('nom1');
        $c=0;
        while ($c <count($noms1)){
            $enc=new Encadreure();
            $enc->nom=$noms1[$c];
            $enc->prenom=$prenoms1[$c];
            $enc->id_mem=$mem1->id;
            $enc->save();
            $c++;
        }

    }
    //--------------------------------------------------------------
    //edit and update document
    public function beforEdit(Request $request){
        $this->validate($request,[
            'code'=>'required|max:10'
        ]);
        $input=$request->get('code');
        $doc=Document::where('code','like',$input)
            ->orWhere('titre','like','%'.$input.'%')
            ->get();
        return view('home')->with(['doc'=>$doc,'action'=>'edit']);
    }
    public function edit($code)
    {
        $doc=Document::find($code);
        return view('document.edit',['doc'=>$doc]);
    }
    public function update($code,$request){
        //virifier les inputs
        $this->validate($request,[
            'titre'=>'required|max:30',
            'nmb_dex'=>'required|numeric|min:0',
            'nom'=>'required|max:20',
            'prenom'=>'required|max:20',
            'emplacment'=>'required|max:30',
            'annee'=>'required|date'
        ]);

        $doc1=Document::findorfail($code);
        $doc1->titre=request('titre');
        $doc1->annee=request('annee');
        $doc1->nmb_dex=request('nmb_dex');
        $doc1->emplacment=request('emplacment');
        $doc1->save();

        $as=Auteur::where('code_doc','=',$code)->get();
        foreach ($as as $aa){$aa->delete();}
        $prenoms=request('prenom');
        $noms=request('nom');
        $c=0;
        while ($c <count($noms)){
            $aut=new Auteur();
            $aut->nom=$noms[$c];
            $aut->prenom=$prenoms[$c];
            $aut->code_doc=$doc1->code;
            $aut->save();
            $c++;
        }
    }
    public function updateLivre($code,Request $request)
    {
        $this->validate($request,[
            'isbn'=>'required|numeric',
            'edition'=>'required|max:30',
        ]);
        $this->update($code,$request);
        Livre::where('code_doc','=',$code)->update(
            [
                'isbn'=>request('isbn'),
                'edition'=>request('edition')
            ]);
        return redirect(route('detaile.book',$code));
    }
    public function updateMemoire($code,Request $request)
    {
        $this->validate($request,[
            'promotion'=>'required',
            'prenom1'=>'required|max:30',
            'nom1'=>'required|max:30'
        ]);

        $this->update($code,$request);
        //up date Memoire
        Memoire::where('code_doc','=',$code)->update(
            [
                'promotion'=>request('promotion')
            ]);
        //up date les Encadreure
        $mem=Memoire::where('code_doc','=',$code)->first();
        Encadreure::where('id_mem','=',$mem->id)->delete();
        $prenoms1=request('prenom1');
        $noms1=request('nom1');
        $c=0;
        while ($c <count($noms1)){
            $enc=new Encadreure();
            $enc->nom=$noms1[$c];
            $enc->prenom=$prenoms1[$c];
            $enc->id_mem=$mem->id;
            $enc->save();
            $c++;
        }

        return redirect(route('detaile.book',$code));
    }
    //--------------------------------------------------------------
    //delet document
    public function beforDelete(Request $request){
        $this->validate($request,[
            'code'=>'required|max:10'
        ]);
        $input=$request->get('code');
        $doc=Document::where('code','like',$input)
            ->orWhere('titre','like','%'.$input.'%')
            ->get();
        return view('home')->with(['doc'=>$doc,'action'=>'suprimer']);
    }
    public function destroy($code)
    {
        Auteur::where('code_doc','=',$code)->delete();
        categorie_document::where('document_code','=',$code)->delete();
        Exemplaire::where('code_doc','=',$code)->delete();
        $doc=Document::find($code);
        if(($doc->livre)!= null){
            Livre::where('code_doc','=',$code)->delete();
        }else{
            $mem=Memoire::where('code_doc','=',$code)->get();
            foreach ($mem as $m){
                Encadreure::where('id_mem','=',$m->id)->delete();
                $m->delete();
            }
        }
        $doc->delete();
        return redirect("/home");
    }

    public function Catégori(){
        $cat=Categorie::all();
        return view('Catégori')->with(['cat'=>$cat]);
    }
    public function addcategori(Request $request){
        $this->validate($request,[
            'name_cat' => [
                    'required',
                    'max:20',
                    'regex:/^[a-zA-ZÀ-ž_\s]*$/'
                ]
        ]);
        $cat=new Categorie();
        $cat->name=request('name_cat');
        $cat->save();
        return redirect('/Catégori');
    }


}
