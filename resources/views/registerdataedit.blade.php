@extends('Layout')
@section('content')
<div class="container py-3">
    <form method="POST" action="/update" class="shadow register">
      @csrf
       <input type="hidden" name="id" value="{{$editdata->id}}">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <div id="emailHelp" class="form-text">You will use this email address to sign in to your new account.</div>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com" value="{{$editdata->email}}">
          <span class="error">@error('email'){{$message}}  @enderror</span>
        </div>
        <div class="mb-3">
          <label for="accountName" class="form-label">Account Name</label>
          <div id="NameHelp" class="form-text">Choose a name for your account.</div>
          <input type="text" class="form-control" placeholder="Enter Your Name" name="name" value="{{$editdata->name}}">
          <span class="error">@error('name'){{$message}}  @enderror</span>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password" name="password" value="{{$editdata->password}}">
          <span class="error">@error('password'){{$message}}  @enderror</span>
        </div>
          <div class="mb-3">
            <label for="Location" class="form-label">Location</label>
            <input type="text" class="form-control" placeholder="Enter Your Full Address" name="location" value="{{$editdata->location}}">
            <span class="error">@error('location'){{$message}}  @enderror</span>
          </div>
          <div class="mb-3">
            <label for="phonenumber" class="form-label">Phone Number</label>
            <input type="text" class="form-control" placeholder="Enter Your Phone number" name="phonenumber" value="{{$editdata->phonenumber}}">
            <span class="error">@error('phonenumber'){{$message}}  @enderror</span>
          </div>
        <button type="submit" class="btn mb-3 w-100" style="background: #232f3e;
        color:white;">Update</button>
       
      </form>   

</div>

@endsection