<?php

use Illuminate\Support\Facades\Route;

Route::prefix('operador')->group(function () {
	Route::group(['middleware' => ['role:operador']], function () {
    	Route::get('/', 'Operador\OperadorController@index')->name('operador.index');
        Route::get('/perfil', 'Operador\OperadorController@perfil')->name('operador.perfil.me');
    	
	});
});
