<?php

use App\Http\Controllers\CustomerCont;
use App\Http\Controllers\itemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rcontroller;
use App\Http\Controllers\admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\admin\Auth\AdminHomeCont;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\newsletterControlle;
use App\Http\Controllers\orderController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\newsletter;

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
require __DIR__.'/auth.php';
/*auth end*/

/*admin access*/
Route::middleware(['admin'])->group(function(){
    //product crud operation
    Route::get('/insertform',[Rcontroller::class,'create']);
    Route::post('/insertform',[Rcontroller::class,'store']);
    Route::get('/allproduct',[Rcontroller::class,'index'])->name('allproduct');
    Route::get('/edit/{id}',[Rcontroller::class,'edit']);
    Route::PUT('/edit/{id}',[Rcontroller::class,'update']);
    Route::DELETE('/delete/{id}',[Rcontroller::class,'destroy']);
 
    //customer get and delete method
    Route::get('/customerDetails',[AdminHomeCont::class,'allcustomer'])->name('allcustomer');
    Route::delete('custdelete/{id}',[AdminHomeCont::class,'destroy']);
    /*Route::get('admindashboard',[AdminHomeCont::class,'index'])->name('adminhomepage');*/
    Route::get('/adminprofile',[AdminHomeCont::class,'fetchadmininfo'])->name('adminprofile');
    Route::post('adminlogout',[AuthenticatedSessionController::class,'destroy'])->name('adminlogout');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
      Route::get('login',[AuthenticatedSessionController::class,'create'])->name('login');
      Route::post('login',[AuthenticatedSessionController::class,'store'])->name('adminlogin');
    });
   
});
/*admin access*/



/*user access*/
Route::middleware(['auth','verified'])->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/userprofile',[CustomerCont::class,'edit'])->name('userprofile');
    Route::PATCH('/profileupdate',[CustomerCont::class,'update']);
    /*add to cart*/ 
    Route::post('/addtocart',[cartController::class,'addtocart']);
    Route::get('/removecartdata/{id}',[cartController::class,'removecartitems']);
    Route::get('/order',[orderController::class,'ordertotalamount'])->name('order');
    Route::post('/storeorder',[orderController::class,'storeorders']);
    Route::post('/displayorder',[orderController::class,'displayorder']);
    Route::get('/cartdata',[cartController::class,'cartitemdisplay'])->name('cart');
});
/*end user access*/




/*guest route*/ 
Route::get('/navbody',[CustomerCont::class,'index']);
Route::get('/book',[itemController::class,'bookDisplay'])->name('book');
Route::get('/cd',[itemController::class,'cdDisplay'])->name('cd');
Route::get('/game',[itemController::class,'gameDisplay'])->name('game');
Route::get('/searchedProduct',[CustomerCont::class,'searchProduct'])->name('searchProduct');
Route::get('/details/{id}',[CustomerCont::class,'details']);
Route::view('/productlists','customer/productlist');
Route::get('/productlist',[orderController::class,'displayorder'])->name('productlist');
Route::get('/downlaodpdf',[orderController::class,'downloadPDF']);
Route::post('/newsletter',[newsletterControlle::class,'sendnewsletter']);
Route::post('/emailsend',[CustomerCont::class,'sendemail']);
/*end guest route*/
/**QueryString(); */


Route::view('email','email');