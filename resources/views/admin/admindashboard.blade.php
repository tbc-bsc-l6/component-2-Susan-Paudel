@extends('adminLayout')
@section('profile')
<div class="container py-5">
  <div class="welcome_Message shadow">
     <h1>Welcome ! {{Auth::guard('admin')->user()->name}}</h1>
  </div>
  <div class="row">
    <div class="col-md-12">
        <form method="POST" action="/profileupdate" class="shadow p-4">
            @csrf
              <h1>Personal Info</h1>
              <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com" value="{{$admindata->email}}" disabled>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="accountName" class="form-label">Account Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Name" name="name" value="{{$admindata->name}}" disabled>
                  </div>
                    <div class="mb-3 col-md-6">
                      <label for="Location" class="form-label">Location</label>
                      <input type="text" class="form-control" placeholder="Enter Your Full Address" name="location" value="{{$admindata->location}}" disabled>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="phonenumber" class="form-label">Phone Number</label>
                      <input type="text" class="form-control" placeholder="Enter Your Phone number" name="phonenumber" value="{{$admindata->phonenumber}}" disabled>
                    </div>
                  
              </div>
             
             
            </form>   
    </div>

</div>
</div>

@endsection