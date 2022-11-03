<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $table = "participantes";

    protected $fillable = ["nombre"];

    public function estado(){
        $this->hasOne(Estado::class);
    }
    
    public function grupo(){
        $this->hasOne(Grupo::class);
    }

    //Modelo sale que tiene participantes_id, pero hace conflicto con ID de tabla
}
