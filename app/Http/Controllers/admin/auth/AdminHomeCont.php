<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\User;

class AdminHomeCont extends Controller
{
    public function index(){
        return view('admin/admindashboard');
    }
    public function fetchadmininfo(){
       $admin=auth('admin')->user()->id;
       return view('/admin/admindashboard',['admindata'=>admin::find($admin)]); 
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allcustomer()
    {
        $customer=User::latest()->paginate(10);
        return view('admin.allregisterdata',['details'=>$customer]);
    }
      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/customerDetails');
    }
}
