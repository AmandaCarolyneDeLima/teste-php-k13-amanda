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

Route::get('/', function () {
    return view("auth.login");
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');


Route::group(["prefix" => "noticias",'middleware' => 'auth'], function () {
    Route::get("/", 'NoticiasController@index');
    Route::get("/new", 'NoticiasController@new');
    Route::post("/salvar", 'NoticiasController@store');
    Route::post("/salvar/{id}", 'NoticiasController@update');
    Route::get("/editar/{id}", "NoticiasController@edit");
    Route::get("/view/{id}", 'NoticiasController@show');
    Route::get("/excluir/{id}", "NoticiasController@destroy");
    Route::post("/busca2", "NoticiasController@busca2");
    Route::post("/busca3", "NoticiasController@busca3");
});

// crud users
Route::group(["prefix" => "user",'middleware' => 'auth'], function () {
    Route::post("/profile_update", 'UsersController@profileUpdate');
    Route::get("/edit_profile", function () {
        return view('edit_profile');
    });
    Route::get("/profile", function () {
        return view('view_profile');
    });
});

Route::get('refresh_captcha', 'Auth\RegisterController@refreshCaptcha')->name('refresh');