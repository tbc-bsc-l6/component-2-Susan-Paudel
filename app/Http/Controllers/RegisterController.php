<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('allregisterdata',['data'=>Customer::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['email'=>'required | email |unique:customers','name'=>'required | String','password'=>'required | min:8','repassword'=>'required | min:8 |same:password','location'=>'required','phonenumber'=>'required |digits:10']);
        $data=new Customer;
       
        $data->email=$request->email;
        $data->name=$request->name;
        
        $data->password=bcrypt($request->password);
        $data->location=$request->location;
        $data->phonenumber=$request->phonenumber;
        $insert=$data->save();
        if($insert){
            return back()->with('success', $request->name." !Please check your email to varify your account. ");
        }else{
            return back()->with('error','data insert unsuccessfull');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('registerdataedit',['editdata'=>Customer::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['email'=>'required | email |unique:customers','name'=>'required | String','password'=>'required | min:8','repassword'=>'required | min:8 |same:password','location'=>'required','phonenumber'=>'required |digits:10']);
        $data=Customer::find($id);
       
        $data->email=$request->email;
        $data->name=$request->name;
        
        $data->password=bcrypt($request->password);
        $data->location=$request->location;
        $data->phonenumber=$request->phonenumber;
        $insert=$data->save();
        if($insert){
            return back()->with('success', $request->name." !Please check your email to varify your account. ");
        }else{
            return back()->with('error','data insert unsuccessfull');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect('/alldata');
    }
}
