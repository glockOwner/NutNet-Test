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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'App\Http\Controllers\Albums', 'prefix' => '/albums'], function (){
    Route::get('/', 'IndexController')->name('albums.index');
    Route::get('/create', 'CreateController')->name('albums.create')->middleware('isAuth');
    Route::post('/store', 'StoreController')->name('albums.store')->middleware('isAuth');
    Route::get('/edit/{album}', 'EditController')->name('albums.edit')->middleware('isAuth');
    Route::patch('/update/{album}', 'UpdateController')->name('albums.update')->middleware('isAuth');
    Route::delete('/delete/{album}', 'DeleteController')->name('albums.delete')->middleware('isAuth');
    Route::post('/prefilling', 'PrefillingController')->name('albums.prefilling')->middleware('isAuth');
    Route::post('/prefilling/store', 'PrefillingStoreController')->name('albums.prefillingstore')->middleware('isAuth');
    Route::patch('/prefilling/update/view/{album}', 'PrefillingUpdateViewController')->name('albums.prefillingedit')->middleware('isAuth');
    Route::patch('/prefilling/update/{album}', 'PrefillingUpdateController')->name('albums.prefilling.update')->middleware('isAuth');


});
