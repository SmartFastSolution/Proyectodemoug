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
Route::get('/requerimientos', 'Api\RequerimientoController@index')->name('requerimientos.index');
Route::get('/requerimiento/{id}', 'Api\RequerimientoController@show')->name('requerimientos.show');


//RUTA DE SECTORES
Route::get('/sectores', 'Api\AtencionController@sectores')->name('sectores.index');
Route::post('/atencion/store', 'Api\AtencionController@store')->name('atencion.store');






