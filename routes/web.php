<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();


Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::post('/update-profile', [App\Http\Controllers\HomeController::class, 'profile_update'])->name('profile.update');
    Route::post('/update-password', [App\Http\Controllers\HomeController::class, 'update_password'])->name('profile.update-password');


    Route::resource('roles','App\Http\Controllers\RoleController');
    Route::resource('users','App\Http\Controllers\UserController');
    Route::resource('employs','App\Http\Controllers\EmployController');
    Route::resource('products','App\Http\Controllers\ProductController');
    Route::resource('imports','App\Http\Controllers\ImportController');
    Route::get('report','App\Http\Controllers\ReportController@index')->name('report.index');
    Route::get('/report/datatables','App\Http\Controllers\ReportController@datatables')->name('report.datatables');



    });
