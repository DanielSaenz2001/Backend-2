<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Authorization,Origin, Content-Type, X-Auth-Token, X-XSRF-TOKEN');


Route::group([
    
    'middleware' => 'api',

], function () {
    //-----------------------API-JWT------------------------\\
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    
    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');
    //-----------------------/API-JWT------------------------\\

    //---------------------API-PERSONA----------------------\\
    Route::get('users', 'PersonaController@PersonasNull');
    Route::get('usuario', 'PersonaController@me');
    Route::get('persona', 'PersonaController@index');
    Route::get('persona/{id}','PersonaController@show');
    
    Route::post('persona', 'PersonaController@create');
    Route::put('persona/{id}', 'PersonaController@update');
    Route::delete('persona/{id}', 'PersonaController@destroy');
    //---------------------/API-PERSONA----------------------\\

    //-----------------------API-PAISES------------------------\\
    Route::get('paises', 'PaisController@paises');
    Route::get('departamentos', 'PaisController@provincias');
    Route::get('provincias', 'PaisController@departamentos');
    //-----------------------/API-PAISES------------------------\\

    //---------------------API-UNIVERSIDAD----------------------\\
    Route::get('facultad', 'FacultadController@index');
    Route::get('facultad/{id}', 'FacultadController@show');
    Route::post('facultad', 'FacultadController@create');
    Route::put('facultad/{id}', 'FacultadController@update');
    Route::delete('facultad/{id}', 'FacultadController@destroy');

    Route::get('escuela', 'EscuelaProfecionalController@index');
    Route::get('escuela/{id}', 'EscuelaProfecionalController@show');
    Route::post('escuela', 'EscuelaProfecionalController@create');
    Route::put('escuela/{id}', 'EscuelaProfecionalController@update');
    Route::delete('escuela/{id}', 'EscuelaProfecionalController@destroy');

    Route::get('especialidad', 'EpEspecialidadController@index');
    Route::get('especialidad/{id}', 'EpEspecialidadController@show');
    Route::post('especialidad', 'EpEspecialidadController@create');
    Route::put('especialidad/{id}', 'EpEspecialidadController@update');
    Route::delete('especialidad/{id}', 'EpEspecialidadController@destroy');
    //---------------------/API-UNIVERSIDAD----------------------\\

    Route::put('image', 'PersonaController@upload');
});