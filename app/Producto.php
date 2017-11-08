<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Producto extends Model
{
    //
    use Sortable;

    protected $table='producto';
    protected $fillable=['id', 'identificador','marca_id','clave','familia_id','tipo_id','subtipo_id','medida1','unidad1_id','medida2','unidad2_id','medida3','unidad3_id','modelo','presentacion_id','calidad_id','acabado_id','descripcion_short','descripcion_large'];
    protected $hidden=['created_at','updated_at'];
    public $sortable=['identificador','clave','descripcion_short','descripcion_large'];

}
