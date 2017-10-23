<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class DireccionFisica extends Model
{
    //
    use Searchable;

    protected $table='direccion_fisica';
    protected $fillable=['id','personal_id','calle','numext','numint', 'colonia','municipio','ciudad','estado', 'referencia', 'calle1', 'calle2'];
    protected $hidden=[ 'created_at', 'updated_at'];
}
