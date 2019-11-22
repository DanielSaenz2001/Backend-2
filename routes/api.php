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
    Route::get('departamentos', 'PaisController@departamentos');
    Route::get('provincias', 'PaisController@provincias');
    Route::get('lugares', 'PaisController@lugares');
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
    //---------------------/API-UNIVERSIDAD----------------------\\

    Route::post('image', 'PersonaController@upload');
    //---------------------/API-EVENTOS----------------------\\
    
    Route::get('eventos', 'EventosController@index');
    Route::get('eventos/{id}', 'EventosController@show');
    Route::post('eventos', 'EventosController@create');
    Route::put('eventos/{id}', 'EventosController@update');
    Route::delete('eventos/{id}', 'EventosController@destroy');
    //----------------------API-EVENTOS----------------------\\

    //----------------------API-EMPRESAS----------------------\\
    Route::get('empresas', 'EmpresasControler@index');
    Route::get('empresas/{id}', 'EmpresasControler@show');
    Route::post('empresas', 'EmpresasControler@create');
    Route::put('empresas/{id}', 'EmpresasControler@update');
    Route::delete('empresas/{id}', 'EmpresasControler@destroy');
    //----------------------/API-EMPRESAS----------------------\\

     //----------------------API-SUGERECIAS----------------------\\
     Route::get('sugerencias', 'SugerenciasControler@index');
     Route::get('sugerencias/{id}', 'SugerenciasControler@show');
     Route::post('sugerencias', 'SugerenciasControler@create');
     Route::put('sugerencias/{id}', 'SugerenciasControler@updateComentario');
     //Route::put('sugerencias/{id}', 'SugerenciasControler@updateAdmin');
     Route::delete('sugerencias/{id}', 'SugerenciasControler@destroy');
      //----------------------/API-SUGERECIAS----------------------\\

      //----------------------/API-EGRESADOS----------------------\\
      Route::get('egresados', 'EgresadosController@index');
      Route::get('egresados/{id}', 'EgresadosController@show');
      Route::post('egresados', 'EgresadosController@create');
      Route::put('egresados/{id}', 'EgresadosController@update');
      Route::delete('egresados/{id}', 'EgresadosController@destroy');
      Route::get('egresadosdatos', 'EgresadosController@egresados');
      //----------------------/API-EGRESADOS----------------------\\

      //----------------------API-CAPACITACIONES--------------------\\
      Route::get('capacitaciones', 'CapacitacionesController@index');
      Route::get('capacitaciones/{id}', 'CapacitacionesController@show');
      Route::post('capacitaciones', 'CapacitacionesController@create');
      Route::put('capacitaciones/{id}', 'CapacitacionesController@update');
      Route::delete('capacitaciones/{id}', 'CapacitacionesController@destroy');
      //----------------------API-CAPACITACIONES--------------------\\
});