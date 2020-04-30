<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public $table='documents';

    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';

    public function livre(){
        return $this->hasOne('App\Livre','code_doc');
    }
    public function memoire(){
        return $this->hasOne('App\Memoire','code_doc');
    }
    public function auteur(){
        return $this->hasMany('App\Auteur','code_doc');
    }
    public function exemplaire(){
        return $this->hasMany('App\Exemplaire','code_doc');
    }
    public function reservation(){
        return $this->hasMany('App\Reservation','code_doc');
    }
    public function categories(){
        return $this->belongsToMany(Categorie::class);
    }

}
