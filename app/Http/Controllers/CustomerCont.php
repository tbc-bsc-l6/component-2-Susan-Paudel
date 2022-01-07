<?php
namespace MyMail;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\user;
use App\Models\emailsend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class CustomerCont extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer/navbody',['data'=>product::latest()->paginate(8)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user_id=auth()->user()->id;
        return view('layouts.app',['fetchcustomer'=>User::find($user_id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate(['phonenumber'=>'required | digits:10','name'=>'required | min:0 | max:50','location'=>'required | min:0 | max:50']);
     
        $user_id=auth()->user()->id;
        $data=user::find($user_id);

        $data->name=$request->name;
        $data->phonenumber=$request->phonenumber;
        $data->location=$request->location;
        $data->password=bcrypt($request->password);
        $insert=$data->save();
        if($insert){
            return back()->with('success','Data update Successfull');
        }else{
            return back()->with('error','data insert unsuccessfull');
        }
    }

    public function searchProduct(Request $request){
        $search = $request->input('search');
        $product =DB::table('products')->where('firstname','like','%'.$search.'%')
            ->orwhere('mainname','like','%'.$search.'%')
            ->orderBy('price');
        // new products
        if($request->get('sortBy') === 'author'){
            $product->orderBy('mainname', 'DESC');
        }
        if($request->get('sortBy') === 'price'){
            $product->orderBy('price', 'ASC');
        }
        
        return view('customer.searchedproduct',['data'=>$product->paginate(8)]);
        
        
    }

    public function details($id){
        return view('customer/productdetails',['detail'=>product::find($id)]);
    }

    public function sendemail(Request $request){
       $request->validate(['fullname'=>'required | min:0 | max:50','email'=>'required | email | unique:emailsends','title'=>'required | min:0 | max:255','message'=>'required | min:0 |max:255']);
        emailsend::create([
           'fullname'=>$request->fullname,
           'email'=>$request->email,
           'title'=>$request->title,
           'message'=>$request->message,
       ]);
       Mail::send('email', array(
        'fullname' => $request->get('fullname'),
        'email' => $request->get('email'),
        'title' => $request->get('title'),
        'form_message' => $request->get('message'),
    ), function($message) use ($request){
        $message->from($request->email);
        $message->to('susanpaudel15@gmail.com', 'Hello Admin')->subject($request->get('title'));
    });
      
        return back()->with('emailsent','Thanks For Contact Us!');
     
    }
}
