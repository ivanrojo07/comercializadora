<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosGenerales extends Model
{
    //
    protected $table = 'datos_generales';
    protected $fillable=['id','giro_id','tamano', 'formacontacto', 'web','comentario', 'fechacontacto'];
    protected $hidden=[ 'created_at', 'updated_at'];
}
