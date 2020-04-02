<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memoire extends Model
{
    public $table='memoires';
    public function document(){
        return $this->belongsTo('App\Document','code_doc');
    }

    public function encadreure(){
        return $this->hasMany('App\Encadreure','id_mem');
    }
}
