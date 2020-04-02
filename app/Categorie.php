<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public $table ="categories";

    public function documents(){
        return $this->belongsToMany('App\Document');
    }
}
