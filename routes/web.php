<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Middleware\HelloMiddleware;

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
    return view('welcome');
});

Route::get('hello', 'HelloController@index')->middleware('auth');
Route::post('hello', 'HelloController@store');
Route::get('hello/rest', 'HelloController@rest');
Route::get('hello/session', 'HelloController@ses_get');
Route::post('hello/session', 'HelloController@ses_post');
Route::get('hello/auth', 'HelloController@getAuth');
Route::post('hello/auth', 'HelloController@postAuth');


Route::get('data', 'DatabaseController@index');

Route::get('data/add', 'DatabaseController@add');
Route::post('data/add', 'DatabaseController@create');
Route::get('data/show', 'DatabaseController@show');
Route::get('data/edit', 'DatabaseController@edit');
Route::post('data/edit', 'DatabaseController@update');
Route::get('data/delete', 'DatabaseController@delete');
Route::post('data/delete', 'DatabaseController@remove');

Route::get('person', 'PersonController@index');
Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');
Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');
Route::get('person/edit', 'PersonController@edit');
Route::post('person/edit', 'PersonController@update');
Route::get('person/delete', 'PersonController@delete');
Route::post('person/delete', 'PersonController@remove');

Route::get('board', 'BoardController@index');
Route::get('board/add', 'BoardController@add');
Route::post('board/add', 'BoardController@create');

Route::resource('rest', 'RestappController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
