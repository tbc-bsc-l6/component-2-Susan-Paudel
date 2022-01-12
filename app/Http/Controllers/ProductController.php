<?php

namespace App\Http\Controllers;

//include the required model 
use App\Models\product;
use Illuminate\Http\Request;

//Rcontroller inherite the property of Controller
class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/allproduct',['data'=>Product::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/productInsert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate function does server side validation of required input fields
        $request->validate(['Firstname'=>'required',
        'type'=>'required | not_in:choose',
        'Surname'=>'required',
        'Title'=>'required',
        'PagesDurationPEGI'=>'required',
        'Price'=>'required',
        'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2028']);

        //add time to request image to make it unique
        $Imagename=time().$request->image->extension();
        //move function move the image into image folder inside public folder
        $request->image->move(public_path('images'),$Imagename);
        //create function create data into db
        $insert=Product::create([
        //storing related request data into db column
        'firstname'=>$request->Firstname,
        'mainname'=>$request->Surname,
        'producttype'=>$request->type,
        'title'=>$request->Title,
        'pdp'=>$request->PagesDurationPEGI,
        'price'=>$request->Price,
        'Image'=>$Imagename]);
        //if insert exist
        if($insert){
            /**
             * @return view allproduct with success message
             */
            return redirect('/allproduct')->with('success','Product insert successfull');
        }else{
            //back with error message
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
       return view('admin.productedit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the id and store it into editdata using key value pair
        return view('admin/productedit',['editdata'=>product::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //validate function does server side validation of required input fields
        $request->validate(['Firstname'=>'required | min:0 | max:100',
        'type'=>'required',
        'Surname'=>'required | min:0 | max:100',
        'Title'=>'required | min:0 | max:255',
        'PagesDurationPEGI'=>'required',
        'Price'=>'required',
        'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2028']);

        //add time to request image to make it unique
        $Imagename=time().$request->image->extension();
        //move function move the image into image folder inside public folder
        $request->image->move(public_path('images'),$Imagename);

        //find the related id from product model
        $data=Product::find($id);
        //passing value from request attribute from form and store into db column
        $data->firstname=$request->Firstname;
        $data->mainname=$request->Surname;
        $data->producttype=$request->type;
        $data->title=$request->Title;
        $data->pdp=$request->PagesDurationPEGI;
        $data->price=$request->Price;
        $data->Image=$Imagename;
        //save the data into database 
        $insert=$data->save();
        //if data is save then
        if($insert){
            //redirect to allproduct
            return redirect('allproduct')->with('updated','Data Updated successfull');
        }else{
            //redirect back with error message
            return back()->with('error','data insert unsuccessfull');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * deleted the selected passed id
     */
    public function destroy($id)
    {
        //find function find the id from product model 
        product::find($id)->delete();
        //redirect to allproduct view after delete
        return back()->with('delete','Product deleted');
    }
}
