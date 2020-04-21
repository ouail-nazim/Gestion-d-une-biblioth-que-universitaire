<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public $table="reservations";
    public function abonner(){
        return $this->belongsTo('App\Abonner','id_abo');
    }
    public function document(){
        return $this->belongsTo('App\Document','code_doc');
    }
}
