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

Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@store');

Route::get('data', 'DatabaseController@index');

Route::get('data/add', 'DatabaseController@add');
Route::post('data/add', 'DatabaseController@create');
Route::get('data/show', 'DatabaseController@show');
Route::get('data/edit', 'DatabaseController@edit');
Route::post('data/edit', 'DatabaseController@update');
Route::get('data/delete', 'DatabaseController@delete');
Route::post('data/delete', 'DatabaseController@remove');
