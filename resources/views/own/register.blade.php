@extends('Layout')
@section('content')
<div class="container py-3">
    <form method="POST" action="/register" class="shadow register">
      @csrf
        <h1>Sign Up</h1>
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
        
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <div id="emailHelp" class="form-text">You will use this email address to sign in to your new account.</div>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com" value="{{old('email')}}">
          <span class="error">@error('email'){{$message}}  @enderror</span>
        </div>
        <div class="mb-3">
          <label for="accountName" class="form-label">Account Name</label>
          <div id="NameHelp" class="form-text">Choose a name for your account.</div>
          <input type="text" class="form-control" placeholder="Enter Your Name" name="name" value="{{old('name')}}">
          <span class="error">@error('name'){{$message}}  @enderror</span>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password" name="password">
          <span class="error">@error('password'){{$message}}  @enderror</span>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Your Password" name="repassword">
            <span class="error">@error('repassword'){{$message}}  @enderror</span>
          </div>
          <div class="mb-3">
            <label for="Location" class="form-label">Location</label>
            <input type="text" class="form-control" placeholder="Enter Your Full Address" name="location" value="{{old('location')}}">
            <span class="error">@error('location'){{$message}}  @enderror</span>
          </div>
          <div class="mb-3">
            <label for="phonenumber" class="form-label">Phone Number</label>
            <input type="text" class="form-control" placeholder="Enter Your Phone number" name="phonenumber" value="{{old('phonenumber')}}">
            <span class="error">@error('phonenumber'){{$message}}  @enderror</span>
          </div>
        <button type="submit" class="btn mb-3 w-100" style="background: #232f3e;
        color:white;">Register</button>
        <div>
            <p>If you have account? <a href="/signin"> SignIn</a> </p>
        </div>
       
      </form>   

</div>

@endsection