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
Route::resource('unidads','Precargas\UnidadController', ['except'=>'show']);
Route::resource('presentacions','Precargas\PresentacionController', ['except'=>'show']);
Route::resource('calidads','Precargas\CalidadController', ['except'=>'show']);
Route::resource('acabados','Precargas\AcabadoController', ['except'=>'show']);
Route::resource('marcas','Precargas\MarcaController', ['except'=>'show']);
Route::get('/buscar','Personal\PersonalController@buscar');
