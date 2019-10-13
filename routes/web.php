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

Route::get('/', function () {
    return view('index');
});

Route::get('/pessoas', 'PessoaController@index');
Route::get('/pessoas/novo', 'PessoaController@create');
Route::post('/pessoas', 'PessoaController@store');
Route::get('/pessoas/visualizar/{id}', 'PessoaController@show');
Route::get('/pessoas/apagar/{id}', 'PessoaController@destroy');
Route::get('/pessoas/editar/{id}', 'PessoaController@edit');
Route::post('/pessoas/{id}', 'PessoaController@update');


