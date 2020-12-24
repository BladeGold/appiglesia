<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();




Route::middleware(['auth'])->group(function(){
    //Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    //Roles
    Route::post('roles/store', 'RoleController@store')->name('roles.store')
           ->middleware('can:roles.create');

    Route::get('roles', 'RoleController@index')->name('roles.index')
        ->middleware('can:roles.index');

    Route::get('roles/create', 'RoleController@create')->name('roles.create')
        ->middleware('can:roles.create');

    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
        ->middleware('can:roles.edit');

    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
        ->middleware('can:roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('can:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('can:roles.edit');

    //Usuarios
    Route::put('users/cambiarpassword/{user}', 'UserController@cambiarPassword')->name('users.updatePassword')
        ->middleware('can:user.edit');

    Route::post('users/store', 'UserController@store')->name('users.store')
        ->middleware('can:users.create');

    Route::get('users', 'UserController@index')->name('users.index')
        ->middleware('can:users.index');

    Route::get('users/registerdate', 'UserController@create')->name('users.create')
        ->middleware('can:users.create');    

    Route::put('users/{user}', 'UserController@update')->name('users.update')
        ->middleware('can:users.edit');
    
    
  
    Route::get('users/{user}', 'UserController@show')->name('users.show')
        ->middleware('can:users.show');

    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
        ->middleware('can:users.destroy');

    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
        ->middleware('can:users.edit');
    
    //Iglesias
    Route::post('iglesias/store', 'IglesiaController@store')->name('iglesias.store')
           ->middleware('can:iglesias.create');

    Route::get('iglesias', 'IglesiaController@index')->name('iglesias.index')
        ->middleware('can:iglesias.index');

    Route::get('iglesias/create', 'IglesiaController@create')->name('iglesias.create')
        ->middleware('can:iglesias.create');

    Route::put('iglesias/{iglesia}', 'IglesiaController@update')->name('iglesias.update')
        ->middleware('can:iglesias.edit');

    Route::get('iglesias/{iglesia}', 'IglesiaController@show')->name('iglesias.show')
        ->middleware('can:iglesias.show');

    Route::delete('iglesias/{iglesia}', 'IglesiaController@destroy')->name('iglesias.destroy')
        ->middleware('can:iglesias.destroy');

    Route::get('iglesias/{iglesia}/edit', 'IglesiaController@edit')->name('iglesias.edit')
        ->middleware('can:iglesias.edit');
    
    
    //Finanzas
    Route::post('finanzas/store', 'FinanzaController@store')->name('finanzas.store')
           ->middleware('can:finanzas.create');

    Route::get('finanzas', 'FinanzaController@index')->name('finanzas.index')
        ->middleware('can:finanzas.index');

    Route::get('finanzas/create', 'FinanzaController@create')->name('finanzas.create')
        ->middleware('can:finanzas.create');

    Route::put('finanzas/{finanza}', 'FinanzaController@update')->name('finanzas.update')
        ->middleware('can:finanzas.edit');

    Route::get('finanzas/{finanza}', 'FinanzaController@show')->name('finanzas.show')
        ->middleware('can:finanzas.show');

    Route::delete('finanzas/{finanza}', 'FinanzaController@destroy')->name('finanzas.destroy')
        ->middleware('can:finanzas.destroy');

    Route::get('finanzas/{finanza}/edit', 'FinanzaController@edit')->name('finanzas.edit')
        ->middleware('can:finanzas.edit');
    
    
    //Noticias
    Route::post('noticias/store', 'NoticiaController@store')->name('noticias.store')
           ->middleware('can:noticias.create');

    Route::get('noticias', 'NoticiaController@index')->name('noticias.index')
        ->middleware('can:noticias.index');

    Route::get('noticias/create', 'NoticiaController@create')->name('noticias.create')
        ->middleware('can:noticias.create');

    Route::put('noticias/{noticia}', 'NoticiaController@update')->name('noticias.update')
        ->middleware('can:noticias.edit');

    Route::get('noticias/{noticia}', 'NoticiaController@show')->name('noticias.show')
        ->middleware('can:noticias.show');

    Route::delete('noticias/{noticia}', 'NoticiaController@destroy')->name('noticias.destroy')
        ->middleware('can:noticias.destroy');

    Route::get('noticias/{noticia}/edit', 'NoticiaController@edit')->name('noticias.edit')
        ->middleware('can:noticias.edit');
    
    
    //Eventos
    Route::post('eventos/store', 'EventoController@store')->name('eventos.store')
           ->middleware('can:eventos.create');

    Route::get('eventos', 'EventoController@index')->name('eventos.index')
        ->middleware('can:eventos.index');

    Route::get('eventos/create', 'EventoController@create')->name('eventos.create')
        ->middleware('can:eventos.create');

    Route::put('eventos/{evento}', 'EventoController@update')->name('eventos.update')
        ->middleware('can:eventos.edit');

    Route::get('eventos/{evento}', 'EventoController@show')->name('eventos.show')
        ->middleware('can:eventos.show');

    Route::delete('eventos/{evento}', 'EventoController@destroy')->name('eventos.destroy')
        ->middleware('can:eventos.destroy');

    Route::get('eventos/{evento}/edit', 'EventoController@edit')->name('eventos.edit')
        ->middleware('can:eventos.edit');

    //Admin
    Route::post('admin/{modulo}/store', 'AdminController@store')->name('admin.store')
           ->middleware('can:admin.create');

    Route::get('admin/{modulo}', 'AdminController@index')->name('admin.index')
        ->middleware('can:admin.index');

    Route::get('admin/{modulo}/create', 'AdminController@create')->name('admin.create')
        ->middleware('can:admin.create');

        Route::put('admin/{modulo}/{id}', 'AdminController@update' )->name('admin.update')
        ->middleware('can:admin.edit');   

    Route::get('admin/{modulo}/{id}', 'AdminController@show')->name('admin.show')
        ->middleware('can:admin.show');

    Route::delete('admin/{modulo}/{id}', 'AdminController@destroy')->name('admin.destroy')
        ->middleware('can:admin.destroy');

    Route::get('admin/{modulo}/{id}/edit', 'AdminController@edit')->name('admin.edit')
        ->middleware('can:admin.edit');

    


});
