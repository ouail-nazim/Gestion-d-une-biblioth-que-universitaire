<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    protected $table="emprunts";
    public function document(){
        return $this->belongsTo('App\Abonner','id_abo');
    }
    public function exemplaire(){
        return $this->belongsTo('App\Exemplaire','id_exm');
    }
}
