<!--extands adminLayout-->
@extends('adminLayout')
<!--section profile start-->
@section('profile')
<!--Profile Page for admin-->
<div class="container py-5">
  <div class="welcome_Message shadow">
    <!--Show the name of admin user-->
     <h1>Welcome ! {{Auth::guard('admin')->user()->name}}</h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <!--form that show the personal information of admin-->
        <form method="POST" action="/profileupdate" class="shadow p-4">
            @csrf
             <!-- Personal Info header -->
              <h1>Personal Info</h1>
              <div class="row">
                 <!-- Email Address -->
                <div class="mb-3 col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com" value="{{$admindata->email}}" disabled>
                  </div>
                   <!-- Account Name -->
                  <div class="mb-3 col-md-6">
                    <label for="accountName" class="form-label">Account Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Name" name="name" value="{{$admindata->name}}" disabled>
                  </div>
                   <!-- Location -->
                    <div class="mb-3 col-md-6">
                      <label for="Location" class="form-label">Location</label>
                      <input type="text" class="form-control" placeholder="Enter Your Full Address" name="location" value="{{$admindata->location}}" disabled>
                    </div>
                     <!-- Phone Number -->
                    <div class="mb-3 col-md-6">
                      <label for="phonenumber" class="form-label">Phone Number</label>
                      <input type="text" class="form-control" placeholder="Enter Your Phone number" name="phonenumber" value="{{$admindata->phonenumber}}" disabled>
                    </div>
                  
              </div>
             
             
            </form>   
            <!--form end-->
    </div>

</div>
</div>
<!--end section-->
@endsection
