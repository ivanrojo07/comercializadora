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

Auth::routes();

Route::resource('giros','Giro\GiroController', ['except'=>'show']);
Route::resource('formacontactos','FormaContacto\FormaContactoController');
Route::resource('clientes','Personal\PersonalController');
Route::resource('clientes.direccionfiscal','Personal\PersonalDireccionFiscalController');
Route::resource('clientes.contacto','Personal\PersonalContactoController');
Route::resource('clientes.datosgenerales','Personal\PersonalDatosGeneralesController', ['except'=>'show']);
Route::resource('familias','Precargas\FamiliaController', ['except'=>'show']);
Route::resource('tipos','Precargas\TipoController', ['except'=>'show']);
Route::resource('subtipos','Precargas\SubtipoController', ['except'=>'show']);
Route::resource('unidad','Precargas\UnidadController', ['except'=>'show']);
Route::resource('presentaciones','Precargas\PresentacionController', ['except'=>'show']);
Route::resource('calidad','Precargas\CalidadController', ['except'=>'show']);
Route::resource('acabados','Precargas\AcabadoController', ['except'=>'show']);
Route::resource('marcas','Precargas\MarcaController', ['except'=>'show']);
Route::get('buscarcliente','Personal\PersonalController@buscar');
Route::resource('productos','Producto\ProductoController');
Route::get('buscarproducto','Producto\ProductoController@buscar');
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
