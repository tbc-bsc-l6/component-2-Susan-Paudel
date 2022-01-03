<?php

use App\Http\Controllers\CustomerCont;
use App\Http\Controllers\itemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rcontroller;
use App\Http\Controllers\admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\admin\Auth\AdminHomeCont;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\orderController;
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
Route::middleware(['admin'])->group(function(){
    Route::get('/insertform',[Rcontroller::class,'create']);
    Route::post('/insertform',[Rcontroller::class,'store']);
    Route::get('/allproduct',[Rcontroller::class,'index'])->name('allproduct');
    Route::get('/edit/{id}',[Rcontroller::class,'edit']);
    Route::post('/edit/{id}',[Rcontroller::class,'update']);
    Route::get('/delete/{id}',[Rcontroller::class,'destroy']);
    Route::get('/customerDetails',[AdminHomeCont::class,'allcustomer'])->name('allcustomer');
    Route::get('custdelete/{id}',[AdminHomeCont::class,'destroy']);
});

/*admin access*/



/*user access*/
Route::middleware(['auth','verified'])->group(function(){
    Route::get('/profile',[CustomerCont::class,'edit']);
    Route::post('/profileupdate',[CustomerCont::class,'update']);
    /*add to cart*/ 
    Route::post('/addtocart',[cartController::class,'addtocart']);
    Route::get('/removecartdata/{id}',[cartController::class,'removecartitems']);
    Route::get('/order',[orderController::class,'ordertotalamount'])->name('order');
    Route::post('/storeorder',[orderController::class,'storeorders']);
    Route::post('/displayorder',[orderController::class,'displayorder']);
    Route::get('/cartdata',[cartController::class,'cartitemdisplay'])->name('cart');
});




/*ens user access*/
Route::get('/', function () {
    return view('welcome');
});

/*customer route*/ 
Route::get('/navbody',[CustomerCont::class,'index']);



route::get('/book',[itemController::class,'bookDisplay'])->name('book');
route::get('/cd',[itemController::class,'cdDisplay'])->name('cd');
route::get('/game',[itemController::class,'gameDisplay'])->name('game');




/*admin*/
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
     Route::namespace('Auth')->middleware('guest:admin')->group(function(){
       Route::get('login',[AuthenticatedSessionController::class,'create'])->name('login');
       Route::post('login',[AuthenticatedSessionController::class,'store'])->name('adminlogin');
     });
    
});
Route::middleware('admin')->group(function(){
   
});
Route::get('admindashboard',[AdminHomeCont::class,'index'])->name('adminhomepage');
Route::post('adminlogout',[AuthenticatedSessionController::class,'destroy'])->name('adminlogout');

/*end admin*/





route::view('/nav','own.nav');
route::view('/footer','own.footer');


/**QueryString(); */
route::get('/hello',[AdminHomeCont::class,'fetchadmininfo'])->name('hello');

Route::get('/searchedProduct',[CustomerCont::class,'searchProduct'])->name('searchProduct');

route::get('/details/{id}',[CustomerCont::class,'details']);
