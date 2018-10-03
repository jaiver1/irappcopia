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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::resource('usuarios/deleted', 'Root\Usuario\UsuarioSoftDeleteController');
Route::resource('usuarios', 'Root\Usuario\UsuarioController');

Route::resource('tipos_medidas/deleted', 'Dato_basico\Tipo_medida\Tipo_medidaSoftDeleteController');
Route::resource('tipos_medidas', 'Dato_basico\Tipo_medida\Tipo_medidaController');

Route::resource('medidas/deleted', 'Dato_basico\Medida\MedidaSoftDeleteController');
Route::resource('medidas', 'Dato_basico\Medida\MedidaController');

Route::resource('especialidades/deleted', 'Clasificacion\Especialidad\EspecialidadSoftDeleteController');
Route::resource('especialidades', 'Clasificacion\Especialidad\EspecialidadController');

Route::resource('categorias/deleted', 'Clasificacion\Categoria\CategoriaSoftDeleteController');
Route::resource('categorias', 'Clasificacion\Categoria\CategoriaController');

Route::resource('marcas/deleted', 'Comercio\Marca\MarcaSoftDeleteController');
Route::resource('marcas', 'Comercio\Marca\MarcaController');

Route::resource('clientes/deleted', 'Contacto\Cliente\ClienteSoftDeleteController');
Route::resource('clientes', 'Contacto\Cliente\ClienteController');
Route::resource('colaboradores/deleted', 'Contacto\Colaborador\ColaboradorSoftDeleteController');
Route::resource('colaboradores', 'Contacto\Colaborador\ColaboradorController');