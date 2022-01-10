<?php

namespace App\Http\Controllers;
//include required class
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Order;
use Barryvdh\DomPDF\Facade as PDF;

//Ordercontroller inherite the property of controller class 
class OrderController extends Controller
{
     /**
     * Display a total of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    function ordertotalamount(){
        //get id from auth user using auth global function
        $user=auth()->user()->id;
        //store data into total amount veriable by joining cart and product using join eleqoent 
        $total_amount=DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$user)
        ->sum('products.price');
        //value that store in total key
        return view('customer/order',['total'=>$total_amount]);
    }



     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function storeorders(Request $req){
        //validate for server side
        $req->validate(['address'=>'required',
        'paymenttype'=>'required | not_in:choose']);
        //get id from login user
        $user=auth()->user()->id;
        //storing userid 
        $allCart=Cart::where('user_id',$user)->get();
        //If you are working with a collection of data we can do something like this using foreach
        foreach($allCart as $cart)
        {
            //storing data into order model
             Order::create([ 'product_id'=>$cart['Product_id'],
            'user_id'=>$cart['User_id'],
            'status'=>"pending",
            'Payment_method'=>$req->paymenttype,
            'payment_status'=>"pending",
            'emailaddress'=>$req->address]);
          
           //after order is colpleted than product will delete from cart
            Cart::where('user_id',$user)->delete();
        }
        //redirect to productlists page from view
        return redirect('/productlists');
    } 


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function displayorder(){
        //get id from authenticate user
        $user=auth()->user()->id;
        //joining orders nd product table using laravel eloquent
        $orders=DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$user)
        ->get();
        //data are store in order key with the help of order value
        return view('customer/orderdisplay',['order'=>$orders]);
    }




    /**
     * converting file into PDF
     * @return \Illuminate\Http\Response 
     * 
     */
    public function downloadPDF(){
        //get id from authenticate user
        $user=auth()->user()->id;
        //joining orders and product table where order userid is equal to loginuser
        $orders=DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$user)
        ->get();
        /**
         * PDFDom is a wrapper for laravel 
         * it convert HTML to PDF
         */
        $pdf = PDF::setOptions(['defaultFont' => 'dejavu serif'])->loadView('customer/orderdisplay',['order'=>$orders]);
        return $pdf->stream('orders.pdf');
    }
}
