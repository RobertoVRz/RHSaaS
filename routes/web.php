<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/user', function () {
    return view('user');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'UserController@index')->name('user');
Route::post('/crearSolicitud', 'UserAPI@crearSolicitud');
Route::post('/subirArchivo', 'UserAPI@subirArchivo');
Route::get('/obtenerSolicitudes', 'UserAPI@obtenerSolicitudes');
Route::get('/obtenerSolicitudesUsuario', 'UserAPI@obtenerSolicitudesUsuario');
Route::post('/editarStatus', 'UserAPI@editarStatus');
