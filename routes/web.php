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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/* routes for games */
Route::group(["prefix" => "game"], function () {
    Route::get("/", "App\Http\Controllers\GameController@index");

    Route::get("/create", "App\Http\Controllers\GameController@create");
    Route::post("/create", "App\Http\Controllers\GameController@postCreate");
    Route::get("/edit/{id}", "App\Http\Controllers\GameController@edit");
    Route::get("/{id}", "App\Http\Controllers\GameController@edit");
    Route::post("/edit/{id}", "App\Http\Controllers\GameController@postEdit");
    Route::get("/delete/{id}", "App\Http\Controllers\GameController@delete");
    Route::get("/get/{id}", "App\Http\Controllers\GameController@getGame");
});

/* routes for results */
Route::post('/create', 'App\Http\Controllers\ResultController@store');
Route::get('/get', 'App\Http\Controllers\ResultController@index');

Route::get('/new-game/{id}', 'App\Http\Controllers\GameController@play');

require __DIR__.'/auth.php';
