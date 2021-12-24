<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class Rcontroller extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('allproduct',['data'=>product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('own/productInsert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['Firstname'=>'required','type'=>'required','Surname'=>'required','Title'=>'required','Pages/Duration/PEGI'=>'required','Price'=>'required']);
        $data=new product;
       
        $data->firstname=$request->Firstname;
        $data->mainname=$request->Surname;
        $data->producttype=$request->type;
        $data->title=$request->Title;
        $data->pdp=$request->PagesDurationPEGI;
        $data->price=$request->Price;
        $insert=$data->save();
        if($insert){
            return back()->with('success',"prodcut inserted");
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
        return view('productdataedit',['editdata'=>product::find($id)]);
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
        $request->validate(['Firstname'=>'required','type'=>'required','Surname'=>'required','Title'=>'required','Pages/Duration/PEGI'=>'required','Price'=>'required']);
        $data=product::find($id);
       
        $data->firstname=$request->Firstname;
        $data->mainname=$request->Surname;
        $data->producttype=$request->type;
        $data->title=$request->Title;
        $data->pdp=$request->PagesDurationPEGI;
        $data->price=$request->Price;
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
        product::find($id)->delete();
        return redirect('/alldata');
    }
}
