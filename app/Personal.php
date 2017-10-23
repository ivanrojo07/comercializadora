<?php

namespace App;

use App\DatosLab;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Personal extends Model
{

    use Searchable, Sortable;
    //
    protected $table='personals';

    public $sortable = [ 'nombre','tipopersona','tipo', 'rfc', 'mail'];
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [


        'id','tipo', 'tipopersona', 'nombre', 'apellidopaterno','apellidomaterno', 'calle', 'numext', 'numinter', 'cp', 'colonia', 'municipio', 'ciudad', 'estado', 'calle1', 'calle2','referencia','recidir','vivienda','mail', 'rfc', 'telefonofijo', 'telefonocel', 'estadocivil'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    // public function clientes(){
    //     return $this->hasMany('App\DatosLab', 'clientes_id');
    // }
    public function datosLab(){
        return $this->hasOne('App\DatosLab');
    }
    public function refpersonals(){
        return $this->hasMany('App\RefPersonal');
    }
    public function beneficiarios(){
        return $this->hasMany('App\Beneficiarios');
    }

    public function toSearchableArray(){
        return $this->toArray();
    }

}
