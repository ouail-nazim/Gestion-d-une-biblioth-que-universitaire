<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exemplaire extends Model
{

    public $table='exemplaires';

    public function document(){
        return $this->belongsTo('App\Document','code_doc');
    }
}
