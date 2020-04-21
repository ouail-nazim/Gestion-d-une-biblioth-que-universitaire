<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Abonner extends Authenticatable
{
    use Notifiable;

    protected $fillable=['num','nom','prenom','password','gender','telephone','email'];

    public function emprunt(){
        return $this->hasMany('App\Emprunt','id_abo');
    }
    public function reservation(){
        return $this->hasMany('App\Reservation','id_abo');
    }
}

