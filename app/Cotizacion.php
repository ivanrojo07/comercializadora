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

    protected $fillable=['id', 'estado','personal_id','empleado_id','cotiza','fecha','validez_cot','total'];

    protected $hidden=['created_at','updated_at','deleted_at'];
    
    // RELACIÓN CLIENTES
    public function cliente(){
    	return $this->belongsTo('App\Personal','personal_id');
    }
    // RELACIÓN EMPLEADO
    public function vendedor(){
    	return $this->belongsTo('App\Empleado', 'empleado_id');
    }
    // CREANDO UN ID ENCRIPTADO PARA LA COTIZACION
    public function generarCustomID(){
        return md5("$this->id $this->updated_at");
    }
    // ACTUALIZA EL ID Y SU ESTADO Y LO GUARDA
    public function actualizaEstado(){
        $this->estado = 'Completo';
        // $this->cotiza = $this->generarCustomID();
        $this->save();
    }
    // GUARDAR CAMBIOS
    public function guardar(){
        $this->actualizaEstado();
    }
    // RELACIÓN UNO (COTIZACION) A MUCHOS (IN_COTIZACION) 
    public function inCotizacion(){
        return $this->hasMany('App\InCotizacion','cotizacion_id','id');
    }
    // RELACION PRODUCTOS DE IN_COTIZACIÓN Y SU CANTIDAD
    public function productos(){
    	return $this->belongsToMany('App\Producto', 'in_cotizacion')->withPivot('cantidad');
    }
    public function productosContar(){
        return $this->productos()->count();
    }
    public function total(){
        $productos = $this->productos()->get();

        $total = 0;
        foreach ($productos as $producto) {
            # code...
            $total = $total + ($producto->pivot->cantidad * $producto->precio);
        }

        return $total;
    }
}
