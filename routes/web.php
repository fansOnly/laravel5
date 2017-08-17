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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// 自定义
// Route::get('now', function () {
//     return date("Y-m-d H:i:s");
// });


// 后台路由组  (middleware:中间件--namespace:命名空间--prefix:路由前缀)
Route::group(['middleware' => 'auth','namespace' => 'Admin', 'prefix' => 'admin'], function(){
    // 控制器在 "App\Http\Controllers\Admin" 命名空间下
    Route::get('/', 'HomeController@index');
});

Route::group(['prefix' => 'admin'], function() {
    // article
    Route::get('article/edit/{id}','ArticleController@edit');
    Route::resource('article', 'ArticleController');
    // 回收站
    Route::get('recycle', 'RecycleController@index');
    Route::get('recycle/restore/{id}', 'RecycleController@restore');
    Route::get('recycle/restoreAll', 'RecycleController@restoreAll');
    Route::get('recycle/delete/{id}', 'RecycleController@delete');
    Route::get('recycle/deleteAll', 'RecycleController@deleteAll');
    // 一级栏目
    Route::get('base/edit/{id}','BaseclassController@edit');
    Route::get('base/create/{id}','BaseclassController@create');
    Route::get('base','BaseclassController@index');
    Route::resource('base','BaseclassController');
    // 二级栏目
    Route::get('second/edit/{id}','SecondclassController@edit');
    Route::resource('second','SecondclassController');
});


// 文章详情
Route::get('display/{id}', 'DisplayController@index');


// 测试路由
Route::get('admin/test', 'TestController@index');