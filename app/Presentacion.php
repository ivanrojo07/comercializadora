<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    //
    use Sortable;
    protected $table='presentacion';
    protected $fillable=['id', 'nombre','abreviatura'];
    protected $hidden=['created_at','updated_at'];
    public $sortable=['id','nombre','abreviatura'];
}
