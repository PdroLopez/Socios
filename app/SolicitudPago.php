<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudPago extends Model
{
    protected $table = "solicitudpago";

    protected $fillable = ["nombre","descripcion","estado_id","transaccion","tiposolicitud","users_id","monto","comentario"];

    public function estado(){
        return $this->belongsTo('App\Estado','estado_id');
    }
    public function user(){
        return $this->belongsTo('App\User','users_id');
    }

  
}
