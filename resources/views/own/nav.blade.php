<?php 
use App\Http\Controllers\cartController;
$total=0;
if(auth()->user()){
  $total=cartController::countcartitem();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
   
    <title>Document</title>
</head>
<body>
  <header class="sticky-top" >
    <div class="container-fluid bg-dark text-white ">
      <div class="container">
        <div class="row py-1 d-flex justify-content-between">
          <div class="col-md-6">
            <div class="register_link">
            @guest
               <span>If you are new user than <a href="{{ route('register') }}" style="color: white;">Register</a></span>
            @endguest
            @auth
               <span>Welcome back {{Auth::user()->name}} </span>
            @endauth
              
            </div>
            
          </div>
          <div class="col-md-6 nav_social_link d-none d-md-block">
            <div class="d-flex justify-content-end">
              <a href="https://www.facebook.com/TheBritishCollege"><span><i class="fab fa-facebook px-1"></i></span></a>
              <a href="https://www.instagram.com/thebritishcollege/"><span><i class="fab fa-instagram px-1"></i></span></a>
                  <a href="https://twitter.com/TBritishcollege"><span><i class="fab fa-twitter px-1"></i></span></a>
                      <a href="https://www.google.com/maps/place//data=!4m2!3m1!1s0x39eb19b19295555f:0xabfe5f4b310f97de?source=g.page.default"><span><i class="fab fa-google-plus px-1"></i></span></a>
            </div>
           
          </div>
        </div>
      </div>
    </div>
    <div class="nav_bar" >
      <nav class="navbar navbar-expand-lg navigation navbar-dark py-4" >
        <div class="container">
          <a class="navbar-brand" href="/navbody" style="font-family: 'Lobster', cursive;font-size:25px;">leedsshop</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-none d-md-block px-5 w-100">
                  <form action="" method="GET" class="input-group">
                    <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Search for Products" name="search">
                    <button class="btn btn-outline-light" type="button" aria-expanded="false">Search</button>
                  </form>
          
                </div>
            
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
              <li class="nav-item">
                <a class="nav-link a" aria-current="page" href="{{route('book')}}">BOOK</a>
              </li>
              <li class="nav-item">
                <a class="nav-link a" href="{{route('cd')}}">CD</a> 
              </li>
              <li class="nav-item">
                <a class="nav-link a" href="{{route('game')}}">GAME</a>
              </li>
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user" style="color:green;" aria-hidden="true"></i><span>{{Auth::user()->name}}</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                    <a class="btn dropdown-item" href="/profile">Dashboard</a>
                  </li>
                  <li> 
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn dropdown-item" href='/logout'> {{ __('Log Out') }}</button>
                   
                  </form>
                </li>
              
                </ul>
              </li>
              @endauth
              @guest
              <li class="nav-item">
                <a class="nav-link active d-flex" aria-current="page" href="{{ route('login') }}"><i class="fa fa-user mt-1" aria-hidden="true"></i><span>SignIn</span></a>
              </li>
              @endguest
              <li class="nav-item">
                <a class="nav-link d-flex active" href="{{route('cart')}}"><i class="fa fa-shopping-cart mt-1" aria-hidden="true"></i><span>Cart</span><span>({{$total}})</span></a>
              </li>
            </ul>
           
          </div>
        </div>
      </nav>
</header>
      <div class="container" id="nav">
        <div class="col-12 pt-3 pb-3 d-md-none">
          <form action="" method="GET" class="input-group">
            <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Search for Products" name="search">
            <button class="btn btn-secondary" type="button" aria-expanded="false">Search</button>
          </form>
         
      
        </div>
      </div>
      </div>