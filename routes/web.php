<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. Estas
| las rutas son cargadas por el RouteServiceProvider dentro de un grupo que
| contiene el grupo de middleware "web". ¡Ahora crea algo grandioso!
|
*/

Auth::routes();

Route::get('/', 'ControladorUsuario@index');
Route::get('registro', 'ControladorUsuario@registro');
Route::get('iniciar-sesion', 'ControladorUsuario@iniciar_sesion');
Route::resource('usuario', 'ControladorUsuario');
Route::resource('login', 'LoginController');

//SOLO CON LOGIN
Route::get('codigos-promocionales', 'ControladorUsuario@codigos_promocionales');
Route::get('generar-codigo', 'ControladorUsuario@generar_codigo');
Route::get('crear-codigo', 'ControladorUsuario@crear_codigo');
Route::get('canjear-codigo/{idCodigo}', 'ControladorUsuario@canjear_codigo');
Route::get('cerrar-sesion', 'LoginController@cerrar_sesion');

