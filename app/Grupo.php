<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = "grupos";

    protected $fillable = ["nombre"];

    public function estado(){
        return $this->belongsTo('App\Estado','estado_id');
    }
    public function area(){
        return $this->belongsTo('App\Area','areas_id');
    }


    //No entiendo relacion entre tabla User y tabla Grupos
}
