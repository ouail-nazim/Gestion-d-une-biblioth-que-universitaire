<?php

namespace App\Http\Controllers;

use App\Abonner;
use App\Document;
use App\Emprunt;
use App\Exemplaire;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class PretController extends Controller
{

    public function creat_add(){
        $ar=array('vous avez inseré ');
        return view('pret.add')->with(['msg'=> null]);
    }
    public function savepret(Request $request){
        //get inputs
        $request->validate([
            'numcart'=>'required|numeric|max:999999999999999',
            'nom'=>'required|alpha|max:20',
            'prenom'=>'required|alpha|max:20',
            'codedoc'=>'required|max:10',
            'numexem'=>'required|numeric',
            'title'=>'required|max:30',
        ]);
        $codedoc=request('codedoc');
        $numexem=request('numexem');
        $title=request('title');
        $numcart=request('numcart');
        $nom=request('nom');
        $prenom=request('prenom');
        //get l'exemplaire avec l'identif et le code de document
        $E1=Exemplaire::where([
            ['identif', '=', $numexem],
            ['code_doc', '=', $codedoc],
        ])->first();
        //get document avec le code de document
        $doc=Document::where('code','=',$codedoc)->first();
        //get l'abonner avec némoro de carte
        $abo=Abonner::where('num','=',$numcart)->first();
        //get le nombre des document qui l'abonner est deja preter
        $nmbr=count(Emprunt::where('num','=',$numcart)->get());
        // specifier le nombre des livre otoriser a labonner et la duré d'après son privlige
        if ($abo == null){
            $ar=array("l'abonner nexist pas ");
            return view('pret.add')->with(['msg'=> $ar]);
        }
        if ($abo->privliger == 'superfan'){$otoris=4;$duré=10;}
        if ($abo->privliger == 'fan'){$otoris=3;$duré=10;}
        if ($abo->privliger == 'simple'){$otoris=3;$duré=7;}
        if ($nmbr<$otoris){
            if (
                ($E1 !=null) // l'exemplaire existe
                &&($doc !=null)// document existe
                &&($abo !=null)// l'abonner existe
                &&(($abo->nom)==$nom)// le nom d'abonner correcte
                &&(($abo->prenom)==$prenom)// le prenom d'abonner correcte
                &&(($abo->pen)== false)//l'abonner n'est pa pinaliser
                &&(($doc->titre)==$title)// le titre de document correcte
                &&(($E1->disponibilite)== true)//l'exemplaire est disponible
            )
            {
                $now = Carbon::today();
                $date_emprunt=$now->toDateString();
                $date_retour=$now->addDays($duré)->toDateString();
                $emprunt=new Emprunt();
                $emprunt->num=$numcart;
                $emprunt->id_abo=$abo->id;
                $emprunt->code_doc=$codedoc;
                $emprunt->num_exem=$numexem;
                $emprunt->date_emprunt=$date_emprunt;
                $emprunt->date_retour=$date_retour;
                $emprunt->save();

                $E1->disponibilite=false;
                $E1->save();
                return view('pret.topdf')->with(
                    [
                        'abo'=>$abo,
                        'doc'=>$doc,
                        'E1'=>$E1,
                        'emprunt'=>$emprunt
                    ]
                );
            }
            else{
                if(($E1 ==null)){
                    $ar=array("l'exemplaire demender n'existe pas");
                    return view('pret.add')->with(['msg'=> $ar]);
                }
                if(($doc ==null)){
                    $ar=array("le document demender n'existe pas");
                    return view('pret.add')->with(['msg'=> $ar]);
                }
                if(($abo->nom)!=$nom){
                    $ar=array('le nom d\'abonner incorrect');
                    return view('pret.add')->with(['msg'=> $ar]);
                }
                if(($abo->prenom)!=$prenom){
                    $ar=array('le prénom d\'abonner incorrect');
                    return view('pret.add')->with(['msg'=> $ar]);
                }
                if(($abo->pen)== true){
                    $ar=array('ce abonner est penalisez ');
                    return view('pret.add')->with(['msg'=> $ar]);
                }
                if((($doc->titre)!=$title)){
                    $ar=array('le titre de document incorrect');
                    return view('pret.add')->with(['msg'=> $ar]);
                }
                if((($E1->disponibilite)== false)){
                      $ar=array('ce exemplaire n\'est pas disponible' );
                      return view('pret.add')->with(['msg'=> $ar]);
                }
            }
        }
        else{
            $ar=array('vous avez dépassé le nombre max de document autorisé');
            return view('pret.add')->with(['msg'=> $ar]);

        }
    }
    public function renouvler($id){
        $emprunt=Emprunt::find($id);

        $now = Carbon::today();
        $date_retour=$now->addDays(15)->toDateString();
        $emprunt->date_retour=$date_retour;
        $emprunt->renouvler=true;
        $emprunt->save();
        return redirect("/more/"."11" );

    }

    public function creat_back(){
        return view('pret.retour_doc')->with(['msg'=> null]);
    }
    public function save_back(Request $request){
        $request->validate([
            'atest'=>'required|numeric',
            'num'=>'required|numeric',
            'code_doc'=>'required|numeric',
            'num_exem'=>'required|numeric',

        ]);
        $codedoc=request('code_doc');
        $numexem=request('num_exem');
        $numcart=request('num');
        $atest=request('atest');

       $emprunt=Emprunt::find($atest);

       if ((($emprunt->num)==$numcart)
            &&(($emprunt->code_doc)==$codedoc)
           &&(($emprunt->num_exem)==$numexem)
       ){
           $E1=Exemplaire::where([
               ['identif', '=', $numexem],
               ['code_doc', '=', $codedoc],
           ])->first();
           $E1->disponibilite=true;
           $E1->update();
           $abo=Abonner::where('num','=',$numcart)->first();
           $abo->point=($abo->point)+1;
           if (($abo->point)==50){$abo->privliger = 'fan';}
           if (($abo->point)==100){$abo->privliger = 'superfan';}
           $abo->update();
           $emprunt->delete();
           return redirect('/home');
       }else{
           dd('hhhhhhh');
       }

        //get l'exemplaire avec l'identif et le code de document
        $E1=Exemplaire::where([
            ['identif', '=', $numexem],
            ['code_doc', '=', $codedoc],
        ])->first();
        //get document avec le code de document
        $doc=Document::where('code','=',$codedoc)->first();
        //get l'abonner avec némoro de carte
        $abo=Abonner::where('num','=',$numcart)->first();
        //get le nombre des document qui l'abonner est deja preter
        $nmbr=count(Emprunt::where('num','=',$numcart)->get());

    }

    //convert to pdf
    public function pdf($id){
        $emprent=Emprunt::find($id);
        $abonner=Abonner::where('num','=',$emprent->num)->first();
        $doc=Document::where('code','=',$emprent->code_doc)->first();


        $nom=$abonner->nom;
        $prenom=$abonner->prenom;
        $num=$abonner->num;
        $titre=$doc->titre;
        $code=$emprent->code_doc;
        $num_exem=$emprent->num_exem;
        $date_emprunt=$emprent->date_emprunt;
        $date_retour=$emprent->date_retour;


        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($this->data_to_html($id,$nom,$prenom,$num,$titre,$code,$num_exem,$date_emprunt,$date_retour));
        return $pdf->stream();
    }
    public function data_to_html($id,$nom,$prenom,$num,$titre,$code,$num_exem,$date_emprunt,$date_retour){

        $output='
                    <div>
                        <div class="head" style="text-align: center;">
                          
                            <h4>La République Algérienne Démocratique et Populaire</h4>
                            <h4>Ministère de l\'Enseignement supérieur et de la Recherche scientifique</h4>
                            <br>
                        </div>
                        <div class="row">
                            <div style="text-align: left;">
                                Universite Constantine 2 Abdelhamid Mehri
                                <br>
                                Faculté des nouvelles technologies de
                                <br>
                                l\'information et de la Communication
                            </div>
                            
                        </div>
                        <div class="row" style="text-align: center;margin-top: 10%">
                             <h3 > attestation de prêt num="'.$id.'"</h3>
                    
                        </div>
                        <div class="row" >
                    
                            <p>
                                le chef de bibliothèque de Faculté des nouvelles technologies de l\'information et de la Communication
                                <br>atteste que l\'etudient(e):
                                <br><br>
                                <strong>Nom :</strong>'.$nom.'
                                <br><strong>Prenom :</strong>'.$prenom.'
                                <br><strong>sous le matricule :</strong>'.$num.'
                                <br><br>
                                Il a fait le prêt de document :
                                <br><br>
                                <strong>Titre :</strong>'.$titre.'
                                <br><strong>Code :</strong>'.$code.'
                                <br><strong>l\'exemplaire numéro :</strong>'.$num_exem.'
                                <br><br> en '.$date_emprunt.'  ,et il doit le retourner en '.$date_retour.'
                            </p>
                    
                        </div>
        '
        ;

        return $output;
    }

}
