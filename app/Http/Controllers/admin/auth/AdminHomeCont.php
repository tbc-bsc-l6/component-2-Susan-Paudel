<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminHomeCont extends Controller
{
    public function index(){
        return view('admin/admindashboard');
    }
}
