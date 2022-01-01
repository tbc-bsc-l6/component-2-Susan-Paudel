<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\order;

class orderController extends Controller
{
    function ordertotalamount(){
        $user=auth()->user()->id;
        $total_amount=DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$user)
        ->sum('products.price');

        return view('customer/order',['total'=>$total_amount]);
    }

    function storeorders(Request $req){
        $req->validate(['address'=>'required','paymenttype'=>'required | not_in:choose']);
        $user=auth()->user()->id;
        $allCart=Cart::where('user_id',$user)->get();
        foreach($allCart as $cart)
        {
            $order=new order;
            $order->product_id=$cart['Product_id'];
            $order->user_id=$cart['User_id'];
            $order->status="pending";
            $order->Payment_method=$req->paymenttype;
            $order->payment_status="pending";
            $order->emailaddress=$req->address;
            $order->save();
            Cart::where('user_id',$user)->delete();
        }
        return redirect('/navbody');
    } 
    function displayorder(){
        $user=auth()->user()->id;
        $orders=DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$user)
        ->get();

        return view('customer/orderdisplay',['order'=>$orders]);
    }
}
