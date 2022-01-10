<?php

namespace App\Http\Controllers;
//include required class,model
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

//CartController extends contoller
class CartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addtocart(Request $request){
      //get id from login user
      $user = auth()->user()->id;
      //condition where product id is equal to table product id and user id is equal to login user
      $product = Cart::where('Product_id', '=', $request->product_id)->where('User_id','=',$user)->first();
      //if product variable is null then
      if ($product === null) {
        //store using cart model
        Cart::create([
            'User_id'=>$user,
            'Product_id'=>$request->product_id,
          ]);
          //return back to this page
          return back();
      } else {
        //if product already exist in cart then
        Session::flash('message', "Product Already Added To The Cart!");
        //return to that where the user was before
        return back();
      }
     
      
    }



    //static function used to invoke a class code when none of its instance exists
    //it can be called without making instance of it
    static function countcartitem(){
      //get id from auth user
        $user_id=auth()->user()->id;
        //count no of product from cart
        return Cart::where('user_id',$user_id)->count();
    }


    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    function cartitemdisplay(){
      //get id from user
        $user=auth()->user()->id;
        //joining carts and product table using eloquent query
        $product=DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$user)
        ->select('products.*','carts.id as cart_id')
        ->get();
        //return
        return view('customer/cartdata',['product'=>$product]);
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response with success message
     * deleted the selected passed id
     */
    function removecartitems($id){
      //select id from cart model
        Cart::find($id)->delete();
        return back()->with('success','Items have been removed');

    }
}
