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

//Admin routes
Route::group(['middleware' => 'admin'], function(){

	Route::group(['middleware' => 'auth:admin'], function(){
		Route::get('/admin', 'AdminController@index');
	});
	
	Route::get('/admin/login', 'AdminController@login');
	Route::post('/admin/postLogin', 'AdminController@postLogin')->name('admin.postLogin');
	Route::get('/admin/logout', 'AdminController@logout');
});

//User routes

//rotas cliente
Route::resource('/cliente','ClienteController')->middleware('auth');
Route::post('/cliente/busca', 'ClienteController@busca')->middleware('auth');

//rotas produto
Route::resource('/produto','ProdutoController')->middleware('auth');

//rotas venda
Route::resource('/venda','VendaController')->middleware('auth');
Route::get('/get-preco/{idProduto}', 'VendaController@getPreco');

//rotas servico
Route::resource('/servico','ServicoController')->middleware('auth');

//rotas agendamento de servico
Route::post('/agendarservico','AgendarServicoController@store')->middleware('auth');
Route::get('/animal/{animal}/agendarservico', 'AgendarServicoController@create')->middleware('auth');
Route::get('/agenda', 'AgendarServicoController@index')->middleware('auth');
Route::get('/agenda/get-preco/{idServico}', 'AgendarServicoController@getPreco')->middleware('auth');
Route::get('/agenda/get-servico/{idServico}', 'AgendarServicoController@getServico')->middleware('auth');
Route::get('/agenda/{id}/edit', 'AgendarServicoController@edit')->middleware('auth');
Route::patch('/agenda/{id}', 'AgendarServicoController@update')->middleware('auth');

//rota cadastro de animal
Route::post('/animal','AnimalController@store');


Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/index', 'UsuarioController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
