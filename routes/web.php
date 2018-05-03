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

Route::get('/', 'CompterenduController@index');


Route::group(['middleware' => ['web']], function() {

	Route::resource('comments','CommentsController');

});

Auth::routes();

Route::resource('user', 'UserController');
Route::resource('compterendu', 'CompterenduController');
Route::resource('compterenduannexe', 'CompterenduannexeController');
Route::resource('joueur', 'JoueurController');

Route::get('/home', 'CompterenduController@index')->name('home');

