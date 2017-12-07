<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Cotizacion extends Model
{
    //
    use Sortable, SoftDeletes;

    protected $table='cotizacion';

    protected $fillable=['id','personal_id','user_id','cotizacion','fecha','producto_id','descuento','cantidad'];

    protected $hidden=['created_at','updated_at','deleted_at'];
    public function cliente(){
    	return $this->belongsTo('App\Personal','personal_id');
    }
    public function vendedor(){
    	return $this->belongsTo('App\User');
    }
    public function producto(){
    	return $this->hasMany('App\Producto');
    }
}
