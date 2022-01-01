<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
class cartController extends Controller
{
    public function addtocart(Request $request){
      $user = auth()->user()->id;
      $cart=new Cart;
      $cart->User_id=$user;
      $cart->Product_id=$request->product_id;
      $cart->save();
      return redirect('/navbody');
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
        Cart::destroy($id);
        return back()->with('success','Items have been removed');

    }
}
