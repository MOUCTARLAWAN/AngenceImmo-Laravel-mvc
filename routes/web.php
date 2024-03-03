<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\PropertyController;
use \App\Http\Controllers\Admin\OptionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});
// Route::prefix('/admin')->name('admin.')->controller(PropertyController::class)->group(function(){
//     Route::get('/property', 'index')->name('index');
//     Route::get('/property', 'create')->name('create');
//     Route::post('/property', 'store');
// });

 //Route::get('/admin.option.index',[OptionController::class, 'index']);
// Route::post('/admin.property.store',[PropertyController::class, 'store']);
// Route::get('/admin.property.create',[PropertyController::class, 'create']);
