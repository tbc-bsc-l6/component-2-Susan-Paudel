<?php

namespace MyMail;

namespace App\Http\Controllers;
//declare required model,class
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Emailsend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

//customerCont inherite proprty of controller 
class CustomerCont extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer/navbody', ['data' => Product::latest()->paginate(8)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //get id from authenticate user
        $user_id = auth()->user()->id;
        //data is store in layout/app folder using fetchcustomer key
        return view('layouts.app', ['fetchcustomer' => User::find($user_id)]);
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
        //selver side validation
        $request->validate([
            'phonenumber' => 'required | digits:10',
            'name' => 'required | min:0 | max:50',
            'location' => 'required | min:0 | max:50'
        ]);
        //get id from authenticate user
        $user_id = auth()->user()->id;
        //find related id from user model i.e from database
        $data = User::find($user_id);
        //updating the data into required database column
        $data->name = $request->name;
        $data->phonenumber = $request->phonenumber;
        $data->location = $request->location;
        //bcrypt function bcrytp our password
        $data->password = bcrypt($request->password);
        //save function store data into database
        $insert = $data->save();
        //if insert contain data
        if ($insert) {
            //return back with success message in session i.e success
            return back()->with('success', 'Data update Successfull');
        } else {
            //return back with error message in session i.e error
            return back()->with('error', 'data insert unsuccessfull');
        }
    }

    /**
     * search function
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function searchProduct(Request $request)
    {
        //store searched input type into search variable
        $search = $request->input('search');
        //searched product by firstname and mainname orderby price
        $product = DB::table('products')->where('firstname', 'like', '%' . $search . '%')
            ->orwhere('mainname', 'like', '%' . $search . '%');
        //if request sortBy is equal to author
        if ($request->get('sortBy') === 'title') {
            //order title as descending order
            $product->orderBy('title', 'DESC');
        }
        //if request sortBy is equal to author
        if ($request->get('sortBy') === 'price') {
            //order created_at as Ascending order
            $product->orderBy('price', 'ASC');
        }
        //dispaly the value into searchproduct page using data key
        return view('customer.searchedproduct', ['data' => $product->paginate(8)]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        return view('customer/productdetails', ['detail' => product::find($id)]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendemail(Request $request)
    {
        //server side validation using validate function 
        $request->validate([
            'fullname' => 'required | min:0 | max:50',
            'email' => 'required | email | unique:emailsends',
            'title' => 'required | min:0 | max:255',
            'message' => 'required | min:0 |max:255'
        ]);
        //create function create data
        Emailsend::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'title' => $request->title,
            'message' => $request->message,
        ]);
        //mail class
        Mail::send('email', array(
            'fullname' => $request->get('fullname'),
            'email' => $request->get('email'),
            'title' => $request->get('title'),
            'form_message' => $request->get('message'),
        ), function ($message) use ($request) {
            $message->from($request->email);
            $message->to('susanpaudel15@gmail.com', 'Hello Admin')->subject($request->get('title'));
        });
        //return back with success message i.e. emailsent
        return back()->with('emailsent', 'Thanks For Contact Us!');
    }


    /**
     * fetch data from emailsend model
     * @return view 
     */
    public function mailsenddata()
    {
        return view('admin/emailsentdata', ['data' => Emailsend::all()]);
    }
}
