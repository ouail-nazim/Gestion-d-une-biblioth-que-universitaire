<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonner extends Model
{
   protected $fillable=['num','nom','prenom','password','gender','telephone','email'];

    public function emprunt(){
        return $this->hasMany('App\Emprunt','id_abo');
    }

}
