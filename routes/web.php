<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('home');
// });

Auth::routes();

Route::resource('giros','Giro\GiroController', ['except'=>'show']);
Route::resource('formacontactos','FormaContacto\FormaContactoController');

Route::resource('clientes','Personal\PersonalController');
Route::resource('clientes.direccionfisica','Personal\PersonalDireccionFisicaController');
Route::resource('clientes.contacto','Personal\PersonalContactoController');
Route::resource('clientes.datosgenerales','Personal\PersonalDatosGeneralesController', ['except'=>'show']);

Route::resource('clientes.crm','Personal\PersonalCRMController');
//---------------------------------------------------------------------
Route::resource('familias','Precargas\FamiliaController', ['except'=>'show']);
Route::resource('tipos','Precargas\TipoController', ['except'=>'show']);
Route::resource('subtipos','Precargas\SubtipoController', ['except'=>'show']);
Route::resource('unidad','Precargas\UnidadController', ['except'=>'show']);
Route::resource('presentaciones','Precargas\PresentacionController', ['except'=>'show']);
Route::resource('calidad','Precargas\CalidadController', ['except'=>'show']);
Route::resource('acabados','Precargas\AcabadoController', ['except'=>'show']);
Route::resource('marcas','Precargas\MarcaController', ['except'=>'show']);
//---------------------------------------------------------------------------
Route::get('buscarcliente','Personal\PersonalController@buscar');

Route::resource('productos','Producto\ProductoController');


Route::get('cotizaciones/buscarproductos','Cotizacion\CotizacionController@buscarproductos');
// Route::resource('incotizacion','Cotizacion\InCotizacionController');
Route::get('incotizacion/{cotizacion}','Cotizacion\InCotizacionController@index');
Route::post('incotizacion','Cotizacion\InCotizacionController@store');
Route::resource('cotizaciones','Cotizacion\CotizacionController');
Route::post('cotizaciones/cotizacionautosave','Cotizacion\CotizacionController@autosave');
Route::get('buscarproducto','Producto\ProductoController@buscar');
Route::get('buscarempleado','Empleado\EmpleadoController@buscar');
Route::get('buscarprovedor','Provedor\ProvedorController@buscar');
Route::get('buscargiro','Giro\GiroController@buscar');
Route::get('buscarformacontacto','FormaContacto\FormaContactoController@buscar');
Route::get('buscarmarca','Precargas\MarcaController@buscar');
Route::get('buscaracabado','Precargas\AcabadoController@buscar');
Route::get('buscarcalidad','Precargas\CalidadController@buscar');
Route::get('buscarfamilia','Precargas\FamiliaController@buscar');
Route::get('buscarpresentacion','Precargas\PresentacionController@buscar');
Route::get('buscarsubtipo','Precargas\SubtipoController@buscar');
Route::get('buscartipo','Precargas\TipoController@buscar');
Route::get('buscarunidad','Precargas\UnidadController@buscar');
// Route::resource('pruebas','PruebasController', ['except'=>'show']);
//-----------------------------------------------------
Route::resource('provedores','Provedor\ProvedorController');
Route::get('buscarprovedor','Provedor\ProvedorController@buscar');
Route::resource('provedores.direccionfisica','Provedor\ProvedorDireccionFisicaController');
Route::resource('provedores.datosgenerales','Provedor\ProvedorDatosGeneralesController', ['except'=>'show']);
Route::resource('provedores.contacto','Provedor\ProvedorContactoController');
Route::resource('provedores.crm','Provedor\ProvedorCRMController');
//----------------------------------------------------------
Route::get('prueba','Provedor\ProvedorDireccionFisicaController@prueba');

// Route::get('busqueda','Personal\PersonalController@busqueda');
Route::resource('empleados','Empleado\EmpleadoController');
Route::resource('empleados.datoslaborales','Empleado\EmpleadosDatosLabController');
Route::resource('empleados.estudios','Empleado\EmpleadosEstudiosController');
Route::resource('empleados.emergencias','Empleado\EmpleadosEmergenciasController');
Route::resource('empleados.vacaciones','Empleado\EmpleadosVacacionesController');
Route::resource('empleados.faltas','Empleado\EmpleadosFaltasAdministrativasController');
Route::resource('contratos','Precargas\TipoContratoController');
Route::resource('bajas','Precargas\TipoBajaController');
//---------BLUE PRINTS---------------------------------
Route::get('sucursales',function(){

	return View::make('sucursales.sucursales');
});
Route::get('gastos',function(){

	return View::make('gastos.gastos');
});
Route::get('consulta',function(){

	return View::make('empleadoconsulta.consulta');
});
Route::get('bonos',function(){

	return View::make('Empleadobonos.bonos');
});
Route::get('comision',function(){

	return View::make('Empleadobonos.comision');
});

