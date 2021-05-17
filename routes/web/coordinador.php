<?php

use Illuminate\Support\Facades\Route;
Route::prefix('coordinador')->group(function() {
    Route::group(['middleware' => ['role:coordinador']], function () {
        Route::get('/', 'Coordinador\CoordinadorController@index')->name('coordinador.index');
        Route::get('/perfil', 'Coordinador\CoordinadorController@perfil')->name('coordinador.perfil.me');
        Route::get('/mapa', 'Coordinador\CoordinadorController@mapa')->name('coordinador.mapa');
        Route::get('/calendario', 'Coordinador\CoordinadorController@calendario')->name('coordinador.calendario');
        Route::get('/atenciones', 'Coordinador\AtencionController@index')->name('coordinador.atencion.index');
        Route::get('/atencion/{id}', 'Coordinador\AtencionController@show')->name('coordinador.atencion.show');
        Route::get('/atencion/{id}/informacion', 'Coordinador\AtencionController@datos')->name('coordinador.atencion.datos');
    });
});