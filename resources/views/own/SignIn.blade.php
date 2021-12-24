@extends('Layout')
@section('content')
<div class="container">
    <form method="POST" action="" class="shadow form">
        <h1>Login</h1>
        <div class="mb-3">
           <!-- <div class="alert alert-success" role="alert">
                A simple success alert—check it out!
              </div>-->
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com" name="email">
          <span class="error"></span>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password" name="password">
          <span class="error"></span>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn mb-3 w-100" style="background: #232f3e;
        color:white;">SignIn</button>
        <div>
            <p>If you are new User? <a href="/register"> Create Account</a> </p>
        </div>
       
      </form>   

</div>

@endsection