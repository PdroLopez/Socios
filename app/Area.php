<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "areas";

    protected $fillable = ["nombre"];

    public function estado(){
        return $this->belongsTo('App\Estado','estado_id');
    }
    public function grupo(){
        return $this->belongsTo('App\Grupo','grupos_id');
    }

    //No entiendo relacion entre tabla User y tabla Areas
}
