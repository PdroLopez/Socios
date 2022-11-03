<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    protected $table = "donaciones";

    protected $fillable = ["nombre","apellidos","telefono","correo","valor_donacion","estado_id"];

    public function estado(){
        return $this->belongsTo('App\Estado','estado_id');
    }
}
