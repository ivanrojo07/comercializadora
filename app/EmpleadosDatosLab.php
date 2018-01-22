<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class EmpleadosDatosLab extends Model
{
    //
    use Sortable, SoftDeletes;

    protected $table='empleadosdatoslab';
    protected $fillable=[
        'id',
        'empleado_id',
        'fechacontratacion',
        'fechaactualizacion',
        'contrato_id',
        'salarionom',
        'salariodia',
        'puesto_inicio',
        'periodopaga',
        'prestaciones',
        'regimen',
        'hentrada',
        'hsalida',
        'hcomida',
        'lugartrabajo',
        'banco',
        'cuenta',
        'clabe',
        'fechabaja',
        'tipobaja_id',
        'comentariobaja',
        'bonopuntualidad',
        'area_id',
        'puesto_id'
    ];
    protected $hidden=['created_at','updated_at'];
    public $sortable=['id'];

    public function empleado(){
    	return $this->belongsTo('App\Empleado', 'empleado_id');
    }
    public function tipocontrato(){
    	return $this->hasOne('App\TipoContrato', 'contrato_id');
    }
    public function tipobaja(){
    	return $this->hasOne('App\TipoBaja','tipobaja_id');
    }
     public function areas(){
        return $this->hasOne('App\Area','area_id');
    }
    public function puestos(){ 
        return $this->hasOne('App\Puesto','puesto_id');
    }

}
