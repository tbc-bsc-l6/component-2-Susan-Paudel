<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\user;
use App\Models\profileImage;

class CustomerCont extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('own/navbody',['data'=>product::latest()->get()]);
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
        $request->validate(['email'=>'required | email','phonenumber'=>'required','name'=>'required','location'=>'required']);
     
        $user_id=auth()->user()->id;
        $data=user::find($user_id);
        
        $data->email=$request->email;
        $data->name=$request->name;
        $data->phonenumber=$request->phonenumber;
        $data->location=$request->location;
        $insert=$data->save();
        if($insert){
            return back()->with('success','Data update Successfull');
        }else{
            return back()->with('error','data insert unsuccessfull');
        }
    }
}
