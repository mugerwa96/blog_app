<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\WelcomeController;
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

// Blog controller
Route::controller(BlogController::class)->prefix("/blog")->group(function(){
    Route::get('/','index')->name("blog.index");
    Route::get('/show','show')->name("blog.show");
    Route::get('/create','create')->name("blog.create");
    Route::get('/edit/{post:slug}','edit')->name("blog.edit");
    Route::post('/store','store')->name("blog.store");
    Route::post('/update','update')->name("blog.update");
    Route::post('/delete','delete')->name("blog.delete");
});

// Admin section
Route::controller(AdminController::class)->prefix('admin')->group(function(){
Route::get('/' ,'index')->name('admin.index');
});

Route::get('/',[WelcomeController::class,'index'])->name('index');

Auth::routes();
// error route
Route::fallback(function(){
    return "not found";
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
