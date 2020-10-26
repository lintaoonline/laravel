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

Route::get('test', function () {
    return 'test';
});

Route::get('app/{id}/{name?}', function ($id, $name) {
    return $id . $name;
})->where(['id' => '[0-9+]', 'name' => '[A-Za-z]+']);