<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Familia extends Model
{
    //
    use Sortable;
    protected $table ='familia';
    protected $fillable=['id', 'nombre','abreviatura'];
    protected $hidden=['created_at','updated_at'];
    public $sortable=['id','nombre','abreviatura'];
}
