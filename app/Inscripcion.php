<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = "inscripciones";

    protected $fillable = ["id","name","rut","fnacimiento","edad","direccion","telefono","email","profesion","oficio","estudios","rama","nombre_institucion","fono_institucion","email_institucion","sancion_comienzo","sancion_termino","detencion_comienzo","detencion_termino","socio","interes","nombres_apoderado","parentesco_apoderado","rut_apoderado","rut_representante","rut_patrocinante","fecha_comision","cedula_delantera","cedula_trasera","foto_carnet","antecedentes",'codigo','token','codigo_inscripcion','comprobante'];

    public function estado(){
        return $this->belongsTo('App\Estado','estado_id');
    }
}
