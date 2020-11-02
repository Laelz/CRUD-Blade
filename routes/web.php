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


// Route::get('/', function (){ return view('auth.login'); })->name('auth.login');
// Route::get('/', function (){ return view('auth.login'); })->name('auth.login');




Auth::routes();

Route::get('/', function (){ return view('auth.login'); })->name('auth.login');
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('produto')->group(function(){
  Route::get('/index', 'ProdutoController@index')->name('produto.index');
  Route::get('/import', 'ProdutoController@import')->name('produto.import');
  Route::post('/importProdutos', 'ProdutoController@importProdutos')->name('produto.importProdutos');
  Route::get('/show', 'ProdutoController@show')->name('produto.show');
  Route::get('/criar', 'ProdutoController@create')->name('produto.create');
  Route::post('/store', 'ProdutoController@store')->name('produto.store');
  Route::put('/update', 'ProdutoController@update')->name('produto.update');
  Route::get('/delete', 'ProdutoController@delete')->name('produto.delete');
});

Route::prefix('aluno')->group(function(){
  Route::get('/show', 'AlunoController@show')->name('aluno.show');
  Route::post('/store', 'AlunoController@store')->name('aluno.store');
  Route::post('/update', 'AlunoController@update')->name('aluno.update');
  Route::get('/delete', 'AlunoController@delete')->name('aluno.index');
});

Route::prefix('vendas')->group(function(){
  Route::get('/index', 'VendasController@index')->name('vendas.index');
});


