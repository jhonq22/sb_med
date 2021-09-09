<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



//Users
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('profile', 'UserController@getAuthenticatedUser');

//CRUD USERS
Route::resource('usuarios', 'UserController');
Route::resource('roles', 'RolesController');

Route::resource('familiares', 'FamiliaresController');

Route::resource('empresas', 'EmpresasController');


Route::resource('productos', 'ProductosController');

Route::resource('orden_compra', 'OrdencompraController');

Route::resource('factura_compra', 'FacturaCompraController');

Route::get('orden_compras/usuarios/{user_id}', 'OrdencompraController@listadoComprasPorUsuario');

Route::get('orden_compras/usuarios/aceptado/{user_id}', 'OrdencompraController@listadoComprasPorUsuarioEnAceptado');





Route::get('orden_compras/usuarios/estatus/espera/{user_id}', 'OrdencompraController@listadoComprasPorUsuarioEnEspera');


Route::get('orden_compras/estatus/espera', 'OrdencompraController@listadoComprasEnEspera');
Route::get('orden_compras/estatus/espera/usuario', 'OrdencompraController@listadoComprasEnEsperaUsuario');


Route::resource('estados','EstadoController');




//facturas por usuarios 
Route::get('facturas/usuarios/{user_id}', 'FacturaCompraController@ListaFacturasPorUsuarios');

//orden Compra por codigo bcv 
Route::get('compras/factura/bcv/{codigo_bcv}', 'OrdencompraController@OrdenesPorCodigoBCV');

