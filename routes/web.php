<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rcontroller;

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
Route::get('/home', function () {
    return view('own/HomePage');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/nav',function(){
    return view('own.nav');
});

Route::get('/footer',function(){
    return view('own.footer');
});
route::get('/navbody',function(){
    return view('own/navbody');
});

Route::get('/insertform',[Rcontroller::class,'create']);