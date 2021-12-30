<?php

use App\Http\Controllers\CustomerCont;
use App\Http\Controllers\itemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rcontroller;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
/*auth*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
/*auth end*/

/*admin access*/
Route::middleware(['auth','admin'])->group(function(){
    Route::get('/insertform',[Rcontroller::class,'create']);
    Route::post('/insertform',[Rcontroller::class,'store']);
    Route::get('/allproduct',[Rcontroller::class,'index']);
    Route::get('/edit/{id}',[Rcontroller::class,'edit']);
    Route::post('/edit/{id}',[Rcontroller::class,'update']);
    Route::get('/delete/{id}',[Rcontroller::class,'destroy']);
});

/*admin access*/



/*user access*/
Route::middleware(['auth'])->group(function(){
    Route::view('/profile','customer.profile');
});
/*ens user access*/
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('own/HomePage');
});

Route::view('/i','own.ImageSlider');


Route::get('/nav',function(){
    return view('own.nav');
});

Route::get('/footer',function(){
    return view('own.footer');
});
route::get('/navbody',function(){
    return view('own/navbody');
});

route::get('/navbody',function(){
    return view('own/navbody');
});

/*customer route*/ 
Route::get('/navbody',[CustomerCont::class,'index']);



route::get('/book',[itemController::class,'bookDisplay']);
route::get('/cd',[itemController::class,'cdDisplay']);
route::get('/game',[itemController::class,'gameDisplay']);

route::view('/pag','own.pagination');
