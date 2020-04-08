<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    protected $table="emprunts";
    public function document(){
        return $this->belongsTo('App\Abonner','code_doc');
    }
}
