<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Banco extends Model
{
    //
    use Sortable, SoftDeletes;
    protected $table='bancos';
    protected $fillable=['nombre','etiqueta'];

    protected $hidden=['created_at','updated_at'];
    public $sortable=['nombre','etiqueta'];
}
