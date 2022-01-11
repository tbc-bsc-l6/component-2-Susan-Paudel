<?php

use App\Http\Controllers\CustomerCont;
use App\Http\Controllers\itemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\admin\Auth\AdminHomeCont;
use App\Http\Controllers\cartController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\OrderController;

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
    //route to dispaly the create product form
    Route::get('/insertform',[ProductController::class,'create']);
    //route to store the product details into database
    Route::post('/insertform',[ProductController::class,'store']);
    //route to dispaly all the product in navbody i.e viewfile
    Route::get('/allproduct',[ProductController::class,'index'])->name('allproduct');
    //route to edit the selected product details using form
    Route::get('/edit/{id}',[ProductController::class,'edit']);
    //route to update the product details
    Route::PUT('/edit/{id}',[ProductController::class,'update']);
    //route to distroy the selected product using id
    Route::DELETE('/delete/{id}',[ProductController::class,'destroy']);
 
    //customer get and delete method
    //route to view all the customer deatils
    Route::get('/customerDetails',[AdminHomeCont::class,'allcustomer'])->name('allcustomer');
    //route to deleted selected customer using its id
    Route::delete('custdelete/{id}',[AdminHomeCont::class,'destroy']);
    /*Route::get('admindashboard',[AdminHomeCont::class,'index'])->name('adminhomepage');*/
    //route to view adminprofile or personal details
    Route::get('/adminprofile',[AdminHomeCont::class,'fetchadmininfo'])->name('adminprofile');
    //route to distroy session or logout for admin
    Route::post('adminlogout',[AuthenticatedSessionController::class,'destroy'])->name('adminlogout');
    //route to view all the sent mail to admin
    Route::get('/viewmailsentdata',[CustomerCont::class,'mailsenddata'])->name('maildata');
});
//route for admin login
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    //calling middleware for admin
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
      //route to view admin login page
      Route::get('login',[AuthenticatedSessionController::class,'create'])->name('login');
      //route to check wheather the login user in valid or not
      Route::post('login',[AuthenticatedSessionController::class,'store'])->name('adminlogin');
    });
   
});
/*admin access*/



/*user access*/
//calling middleware wheather the user is authenticate and varified
Route::middleware(['auth','verified'])->group(function(){
    //route to view dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //route to view userprofile
    Route::get('/userprofile',[CustomerCont::class,'edit'])->name('userprofile');
    //route to update user personal information
    Route::PATCH('/profileupdate',[CustomerCont::class,'update']);


    /*add to cart route*/ 
    //route is called if addtocart button is pressed
    Route::post('/addtocart',[cartController::class,'addtocart']);
    //route to delete items from the cart
    Route::get('/removecartdata/{id}',[cartController::class,'removecartitems']);
    //route to view order
    Route::get('/order',[OrderController::class,'ordertotalamount'])->name('order');
    //route to store order into database
    Route::post('/storeorder',[OrderController::class,'storeorders']);
    //route to displayorder of related user i.e.who is logined
    Route::post('/displayorder',[OrderController::class,'displayorder']);
    //route to display cart item into cart
    Route::get('/cartdata',[cartController::class,'cartitemdisplay'])->name('cart');
    //route to view productlists i.e tanks for order content
    Route::view('/productlists','customer/productlist');
    //route to display order items
    Route::get('/productlist',[OrderController::class,'displayorder'])->name('productlist');
    //route to downlaod pdf file 
    Route::get('/downlaodpdf',[OrderController::class,'downloadPDF']);
});
/*end user access*/




/*guest route*/
//route to display homepage content
Route::get('/navbody',[CustomerCont::class,'index']);
//route to display only books
Route::get('/book',[ItemController::class,'bookDisplay'])->name('book');
//route to display only cds
Route::get('/cd',[ItemController::class,'cdDisplay'])->name('cd');
//route to display only games
Route::get('/game',[ItemController::class,'gameDisplay'])->name('game');
//route to get related searched product and sort products
Route::get('/searchedProduct',[CustomerCont::class,'searchProduct'])->name('searchProduct');
//route to get details of the product using related id
Route::get('/details/{id}',[CustomerCont::class,'details']);
//route to subscribe for newsletter
Route::post('/newsletter',[NewsletterController::class,'sendnewsletter']);
//route to send mail 
Route::post('/emailsend',[CustomerCont::class,'sendemail']);
/*end guest route*/
/**QueryString(); */


