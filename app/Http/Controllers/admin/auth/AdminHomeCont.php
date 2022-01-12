<?php

namespace App\Http\Controllers\Admin\Auth;

//include required model,class
use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\User;
//admin inherite the property of parent Controller
class AdminHomeCont extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/admindashboard');
    }

    /**
     * Show the form for profile the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchadmininfo()
    {
        //fetch login admin id
        $admin = auth('admin')->user()->id;
        return view('/admin/admindashboard', ['admindata' => admin::find($admin)]);
    }



    /**
     * Display a listing of customer in the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allcustomer()
    {
        //fetch admin id
        $customer = User::latest()->paginate(10);
        return view('admin.allregisterdata', ['details' => $customer]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find id and delete it
        User::find($id)->delete();
        return redirect('/customerDetails');
    }
}
