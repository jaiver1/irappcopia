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

Route::resource('usuarios/deleted', 'Root\Usuario\UsuarioSoftDeleteController',
[
    'names' => [
        'index' => 'usuarios.deleted.index',
        'update' => 'usuarios.deleted.update',
        'destroy' => 'usuarios.deleted.destroy'
    ]
]);

Route::resource('usuarios', 'Root\Usuario\UsuarioController');

Route::resource('tipos_medidas/deleted', 'Dato_basico\Tipo_medida\Tipo_medidaSoftDeleteController',
[
    'names' => [
        'index' => 'tipos_medidas.deleted.index',
        'update' => 'tipos_medidas.deleted.update',
        'destroy' => 'tipos_medidas.deleted.destroy'
    ]
]);

Route::resource('tipos_medidas', 'Dato_basico\Tipo_medida\Tipo_medidaController');

Route::resource('medidas/deleted', 'Dato_basico\Medida\MedidaSoftDeleteController',
[
    'names' => [
        'index' => 'medidas.deleted.index',
        'update' => 'medidas.deleted.update',
        'destroy' => 'medidas.deleted.destroy'
    ]
]);

Route::resource('medidas', 'Dato_basico\Medida\MedidaController');

Route::resource('especialidades/deleted', 'Clasificacion\Especialidad\EspecialidadSoftDeleteController',
[
    'names' => [
        'index' => 'especialidades.deleted.index',
        'update' => 'especialidades.deleted.update',
        'destroy' => 'especialidades.deleted.destroy'
    ]
]);

Route::resource('especialidades', 'Clasificacion\Especialidad\EspecialidadController');

Route::resource('categorias/deleted', 'Clasificacion\Categoria\CategoriaSoftDeleteController',
[
    'names' => [
        'index' => 'categorias.deleted.index',
        'update' => 'categorias.deleted.update',
        'destroy' => 'categorias.deleted.destroy'
    ]
]);

Route::resource('categorias', 'Clasificacion\Categoria\CategoriaController');

Route::resource('marcas/deleted', 'Comercio\Marca\MarcaSoftDeleteController',
[
    'names' => [
        'index' => 'marcas.deleted.index',
        'update' => 'marcas.deleted.update',
        'destroy' => 'marcas.deleted.destroy'
    ]
]);

Route::resource('marcas', 'Comercio\Marca\MarcaController');

Route::resource('clientes/deleted', 'Contacto\Cliente\ClienteSoftDeleteController');
Route::resource('clientes', 'Contacto\Cliente\ClienteController');
Route::resource('colaboradores/deleted', 'Contacto\Colaborador\ColaboradorSoftDeleteController');
Route::resource('colaboradores', 'Contacto\Colaborador\ColaboradorController');