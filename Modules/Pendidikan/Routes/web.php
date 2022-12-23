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

Route::controller(PendidikanController::class)->group(function() {

    Route::get('/pendidikan','index')->name('pendidikan');
    Route::get('/pendidikan/table','initTable')->name('pendidikan/table');
    Route::post('/pendidikan/store','store')->name('pendidikan/store');
    Route::post('/pendidikan/edit','edit')->name('pendidikan/edit');
    Route::post('/pendidikan/update','update')->name('pendidikan/update');
    Route::post('/pendidikan/destroy','destroy')->name('pendidikan/destroy');
    Route::post('/pendidikan/combobox','combobox')->name('pendidikan/combobox');

});
