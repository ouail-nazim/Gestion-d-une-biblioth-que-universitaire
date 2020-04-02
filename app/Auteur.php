<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    public function document(){
        return $this->belongsTo('App\Document');
    }
}
