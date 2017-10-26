<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class FormaContacto extends Model
{
    //
    use Sortable;

    protected $table = 'forma_contacto';
    protected $fillable = ['id','nombre', 'etiqueta'];
    protected $hidden =['created_at', 'updated_at'];
    public $sortable = ['id', 'nombre', 'etiqueta'];
}
