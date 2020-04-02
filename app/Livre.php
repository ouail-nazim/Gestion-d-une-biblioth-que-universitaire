<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    public $table='livres';
    public function document(){
        return $this->belongsTo('App\Document','code_doc');
    }

}
