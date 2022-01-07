<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class cartController extends Controller
{
    public function addtocart(Request $request){
      $user = auth()->user()->id;
      $product = Cart::where('Product_id', '=', $request->product_id)->where('User_id','=',$user)->first();
      if ($product === null) {
        Cart::create([
            'User_id'=>$user,
            'Product_id'=>$request->product_id,
          ]);
          return back();
      } else {
        Session::flash('message', "Product Already Added To The Cart!");
        return back();
      }
     
      
    }
    static function countcartitem(){
        $user_id=auth()->user()->id;
        return Cart::where('user_id',$user_id)->count();
    }
    function cartitemdisplay(){
        $user=auth()->user()->id;
        $product=DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$user)
        ->select('products.*','carts.id as cart_id')
        ->get();
        return view('customer/cartdata',['product'=>$product]);
    }

    function removecartitems($id){
        Cart::find($id)->delete();
        return back()->with('success','Items have been removed');

    }
}
