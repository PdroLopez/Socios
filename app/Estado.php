<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = "estado";

    protected $fillable = ["nombre"];

    public function bingo(){
        return $this->hasMany(Bingo::class, 'estado_id');
    }

    public function boleto(){
        return $this->hasMany(Boleto::class, 'estado_id');
    }

    public function donacion(){
        return hasMany(Donacion::class, 'donacion_id');
    }

    public function inscripcion(){
        return $this->hasMany(Inscripcion::class, 'inscripciones_id');
    }
    public function area(){
        return  $this->hasMany(Area::class, 'areas_id');
    }
    public function grupo(){
        return $this->belongsTo(Grupo::class, 'areas_id');
    }
    public function participante(){
        return $this->belongsTo(Participante::class, 'estado_id');

    }
}
