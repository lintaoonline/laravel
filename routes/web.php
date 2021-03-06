<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

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

// 路由别名
Route::get('user/center', ['as' => 'center', function () {
    return route('center');
}]);

// 路由群组
Route::group(['prefix' => 'member'], function () {
    Route::get('user/center', ['as' => 'center', function () {
        return route('center');
    }]);

    Route::get('user/info', function () {
        return 'info';
    });
});

// Route::get('/info', 'UserController@info');
// https://learnku.com/docs/laravel/8.x/releases/9351#d99737
Route::get('/info/{id?}', [UserController::class, 'info'])->where(['id' => '[0-9]+']);

Route::get('/student/{id?}', [StudentController::class, 'info'])->where(['id' => '[0-9]+']);

Route::get('/query', [StudentController::class, 'query']);
Route::get('/orm', [StudentController::class, 'orm']);
Route::get('user', [UserController::class, 'user']);


Route::group(['middleware' => ['web']], function () {
    Route::get('session1', [UserController::class, 'session1']);
    Route::get('session2', [UserController::class, 'session2']);
});

Route::any('response', [UserController::class, 'response']);

Route::any('activity0', [UserController::class, 'activity0']);



Route::group(['middleware' => ['activity']], function () {
    Route::any('activity1', [UserController::class, 'activity1']);
    Route::any('activity2', [UserController::class, 'activity2']);
});


Route::any('queue', [UserController::class, 'queue']);

// 路由视图
Route::get('view', function () {
    return view('welcome');
});
