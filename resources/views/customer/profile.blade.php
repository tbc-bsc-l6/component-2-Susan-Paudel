@extends('Layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 shadow py-5">
            <div class="profile_img py-4">
                <img src="https://media.istockphoto.com/photos/young-beautiful-woman-picture-id1294339577?b=1&k=20&m=1294339577&s=170667a&w=0&h=_5-SM0Dmhb1fhRdz64lOUJMy8oic51GB_2_IPlhCCnU=" alt="">
            </div>
             <div class="d-flex justify-content-center">
                <button class="btn btn-outline-dark w-50">upload Image</button>
             </div>
        </div>
        <div class="col-md-8">
            <form method="POST" action="/register" class="shadow p-4">
                @csrf
                  <h1>Personal Info</h1>
                  @if (Session::has('success'))
                  <div class="mb-3">
                     <div class="alert alert-success" role="alert">
                      {{Session::get('success')}}
                     </div>
                  </div> 
                  @endif
                  @if (Session::has('error'))
                  <div class="mb-3">
                     <div class="alert alert-warning" role="alert">
                      {{Session::get('error')}}
                     </div>
                  </div> 
                  @endif
                  <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com" value="{{$editdata->email}}">
                        <span class="error">@error('email'){{$message}}  @enderror</span>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="accountName" class="form-label">Account Name</label>
                        <input type="text" class="form-control" placeholder="Enter Your Name" name="name" value="{{$editdata->name}}">
                        <span class="error">@error('name'){{$message}}  @enderror</span>
                      </div>
                        <div class="mb-3 col-md-6">
                          <label for="Location" class="form-label">Location</label>
                          <input type="text" class="form-control" placeholder="Enter Your Full Address" name="location" value="{{$editdata->location}}">
                          <span class="error">@error('location'){{$message}}  @enderror</span>
                        </div>
                        <div class="mb-3 col-md-6">
                          <label for="phonenumber" class="form-label">Phone Number</label>
                          <input type="text" class="form-control" placeholder="Enter Your Phone number" name="phonenumber" value="{{$editdata->phonenumber}}">
                          <span class="error">@error('phonenumber'){{$message}}  @enderror</span>
                        </div>
                      
                  </div>
                  <button type="submit" class="btn mb-3" style="background: #232f3e;
                  color:white;">Save</button>
                 
                </form>   
        </div>
    </div>
</div>   
@endsection


