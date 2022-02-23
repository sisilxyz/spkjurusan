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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');
Route::resource('/datauser', 'Admin\datauserController');
Route::resource('/jurusan', 'Admin\jurusanController');
Route::resource('/kriteria', 'Admin\kriteriaController');
Route::post('/importuser', 'Admin\datauserController@datauserimport')->name('importdatauser');
Route::resource('/kriteria_jurusan', 'Admin\kriteria_jurusanController');
Route::resource('/bobot', 'Admin\bobotController');

Route::get('/about', function () {
    return view('about');
})->name('about');

