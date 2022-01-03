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
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
              <a href="https://www.facebook.com/TheBritishCollege" target="_blank"><span><i class="fab fa-facebook px-1"></i></span></a>
              <a href="https://www.instagram.com/thebritishcollege/" target="_blank"><span><i class="fab fa-instagram px-1"></i></span></a>
                  <a href="https://twitter.com/TBritishcollege" target="_blank"><span><i class="fab fa-twitter px-1"></i></span></a>
                      <a href="https://www.google.com/maps/place//data=!4m2!3m1!1s0x39eb19b19295555f:0xabfe5f4b310f97de?source=g.page.default" target="_blank"><span><i class="fab fa-google-plus px-1"></i></span></a>
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
                  <form action="/searchedProduct" method="GET" class="input-group">
                    <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Search for Products" name="search" value="{{request('search')}}">
                    <button class="btn btn-outline-light" type="submit" aria-expanded="false">Search</button>
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
              <style>
                .line-clamp-4 {
  overflow: hidden;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  /* truncate to 4 lines */
  -webkit-line-clamp: 4;
  width:10px;
}
                </style>
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <p class="line-clamp-4" ><i class="fa fa-user" style="color:green;" aria-hidden="true"></i> {{Auth::user()->name}}</p>
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
          <form action="/searchedProduct" method="GET" class="input-group">
            <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Search for Products" name="search" value="{{request('search')}}">
            <button class="btn btn-secondary" type="submit" aria-expanded="false">Search</button>
          </form>
         
      
        </div>
      </div>
      </div>

  @yield('book')
  @yield('cd')
  @yield('game')
  @yield('navbody')
  @yield('content')
  @yield('pagination')
  @yield('login')
  @yield('searched')
  @yield('profile')
  @yield('productdetails')

  <div class="container-fluid footer">
    <div class="container">
        <div class="col-md-12 section-1 pt-3">
            <a href="#nav"><p class="text-center py-2 text-white text-uppercase">BACK TO TOP</p></a> 
         </div>
        <div class="row text-white justify-content-between d-flex">
            <div class="col-md-3 py-4">
                <h5 class="pb-3">OUR SERVICES</h5>
                <P class="point"><a href="{{route('cd')}}">Cd</a></p>
                <p class="point"><a href="{{route('book')}}">Book</a></p>
                <p class="point"><a href="{{route('game')}}">Game</a></p>
            </div>
            <div class="col-md-3 py-4">
                <h5 class="pb-3 point"><a href="#contact" style="text-decoration: none; color:white;">CONTACT US</a></h5>
                <P class="point"><i class="fa fa-phone me-1" aria-hidden="true"></i> 01-6698772</p>
                <p class="point"><i class="fa fa-map-marker me-1" aria-hidden="true"></i>Thapathali, Kathmandu<br></p>
                <p class="point"><i class="fa fa-envelope me-1" aria-hidden="true"></i> info@thebritishcollege.edu.np</p>
               
            </div>
          
            <div class="col-md-3 py-4">
                <div>
                    <h5 class="pb-3">SOCIAL MEDIA</h5>
                <a href="https://www.facebook.com/TheBritishCollege" target="_blank"><span><i class="fab fa-facebook fa-2x "></i></span></a>
                    <a href="https://www.instagram.com/thebritishcollege/" target="_blank"><span><i class="fab fa-instagram fa-2x px-2"></i></span></a>
                        <a href="https://twitter.com/TBritishcollege" target="_blank"><span><i class="fab fa-twitter fa-2x px-2"></i></span></a>
                            <a href="https://www.google.com/maps/place//data=!4m2!3m1!1s0x39eb19b19295555f:0xabfe5f4b310f97de?source=g.page.default" target="_blank"><span><i class="fab fa-google-plus fa-2x"></i></span></a>
                </div>
                

            </div>
            <div class="col-md-3 py-4">
                <h5 class="pb-3 point"><a href="#about" style="text-decoration: none; color:white;">LOCATION</a></h5>
                <div style="width: 100%"><iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=british%20college,nepal+(M)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/car-satnav-gps/">best car gps</a></iframe></div>
            </div>
            <div class="col-md-12" style="border-top:1px solid white;">
                <div class="row py-1">
                    <div class="col text-center">
                         <p class="user-select-none mt-3"><i class="far fa-copyright"></i> 2022 Susan Paudel | All Copyrights reserved</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
       

    </div>
</div>

  <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>