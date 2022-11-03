<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresa";
    protected $fillable = ["id","nombre","rut","direccion","email","telefono","f_nacimiento"];

}
