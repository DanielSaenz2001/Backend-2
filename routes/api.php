<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Authorization,Origin, Content-Type, X-Auth-Token, X-XSRF-TOKEN');


Route::group([
    
    'middleware' => 'api',

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    
    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');

    Route::get('usuario', 'PersonaController@me');
    Route::get('persona', 'PersonaController@index');
    Route::get('persona/{id}','PersonaController@show');
    Route::get('users', 'PersonaController@PersonasNull');
    Route::post('persona', 'PersonaController@create');
    Route::put('persona/{id}', 'PersonaController@update');
    Route::delete('persona/{id}', 'PersonaController@destroy');

    Route::get('paises', 'PaisController@index');
    Route::post('paises', 'PaisController@create');
    Route::put('paises/{id}', 'PaisController@update');
    Route::delete('paises/{id}', 'PaisController@destroy');

    Route::get('departamentos', 'DepartamentoController@index');
    Route::post('departamentos', 'DepartamentoController@create');
    Route::put('departamentos/{id}', 'DepartamentoController@update');
    Route::delete('departamentos/{id}', 'DepartamentoController@destroy');

    Route::get('provincias', 'ProvinciaController@index');
    Route::post('provincias', 'ProvinciaController@create');
    Route::put('provincias/{id}', 'ProvinciaController@update');
    Route::delete('provincias/{id}', 'ProvinciaController@destroy');
    
    Route::get('facultad', 'FacultadController@index');
    Route::post('facultad', 'FacultadController@create');
    Route::put('facultad/{id}', 'FacultadController@update');
    Route::delete('facultad/{id}', 'FacultadController@destroy');

    Route::get('escuela', 'EscuelaProfecionalController@index');
    Route::post('escuela', 'EscuelaProfecionalController@create');
    Route::put('escuela/{id}', 'EscuelaProfecionalController@update');
    Route::delete('escuela/{id}', 'EscuelaProfecionalController@destroy');

    Route::get('especialidad', 'EpEspecialidadController@index');
    Route::post('especialidad', 'EpEspecialidadController@create');
    Route::put('especialidad/{id}', 'EpEspecialidadController@update');
    Route::delete('especialidad/{id}', 'EpEspecialidadController@destroy');
});