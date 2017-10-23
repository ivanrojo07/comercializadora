<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Contacto extends Model
{
	use Searchable, Sortable;
    //
    protected $table='contacto';
    protected $fillable=['id','personal_id','nombre', 'apater', 'amater', 'area','puesto', 'telefono1', 'ext1','telefono2', 'ext2', 'telefonodir', 'celular1','celular2','email1','email2'];
    protected $hidden=[ 'created_at', 'updated_at'];
    public $sortable=['nombre', 'apater', 'amater','area','email1','email2'];
}
