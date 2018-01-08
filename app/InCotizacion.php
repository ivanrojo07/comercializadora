<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class InCotizacion extends Model
{
    //
    use Sortable, SoftDeletes;

    protected $table='in_cotizacion';

    protected $fillable=['id','cotizacion_id','producto_id','descuento_prod','cantidad'];

    protected $hidden = ['deleted_at','created_at','updated_at'];

    // RELACIÓN CON COTIZACIÓN
    public function cotizacion(){
    	return $this->belongsTo('App\Cotizacion','cotizacion_id');
    }

    // RELACIÓN CON PRODUCTOS
    public function producto(){
    	return $this->belongsTo('App\Producto');
    }
}
