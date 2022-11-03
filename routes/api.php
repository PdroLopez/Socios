<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('webhook', 'ApiController@webhook');

Route::post('webhook-facebook', 'Api\ApiController@webhook_facebook');

Route::get('/prueba','Api\ApiControlle@prueba');
Route::get('/crear-usuario','Api\ApiControlle@crearUsuario');
Route::get('/crear-paciente','Api\ApiControlle@crearUsuarioPaciente');
Route::get('/pago-consulta','Api\ApiControlle@transbank');
Route::get('/solicitar-retiro','Api\ApiControlle@solicitarRetiro');
Route::post('/webhook', 'Api\ApiControlle@webhook');
Route::post('/prueba-pago','Api\ApiControlle@prueba_pago');
Route::get('/return','Api\ApiControlle@return');
Route::get('/consulta-transaccion','Api\ApiControlle@prueba_transaccion');
