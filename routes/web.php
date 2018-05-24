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

Route::get('/', function() {
    return "<i>Nosso site lindo: </i> <h1>emakersJúnior.ufla.br <span style='color: purple;'> <3</span></h1>";
});


Route::get('/pcd', function () {
    return view('welcome');
});


Route::group(["prefix" => "nemesys"], function() {

	Route::group(["middleware" => "auth"], function(){

		Route::get('/', 'HomeController@index')->name('home');

		Route::post('/register/store', 'RegisterControllerAdmin@store')->name('registerAdmin.store');

		Route::group(["prefix" => "pcd"], function() {

			Route::get('/', 'pcdController@view')->name('pcd.view');

			Route::group(["prefix" => "form"], function() {

				Route::get('/', 'formController@view')->name('pcd.form.view');

				Route::post('store', 'formController@store')->name('pcd.form.store');
			});
		});
	});

	Auth::routes();

});


/*
 * Views com variáveis
 *
Route::get('/{id}', function($id) {
	return view('layouts.postId')
		->with('id', $id);
});

*/
