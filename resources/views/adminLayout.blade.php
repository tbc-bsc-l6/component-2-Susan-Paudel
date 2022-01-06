<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="sticky-top" >
        <div class="nav_bar" >
          <nav class="navbar navbar-expand-lg navigation navbar-dark py-4" >
            <div class="container">
              <a class="navbar-brand" href="{{route('adminprofile')}}">Admin Dashboard</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('allproduct')}}">All Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{route('allcustomer')}}">All Customer</a>
                  </li>
                  @auth('admin')
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-user" style="color:green;" aria-hidden="true"></i><span>{{Auth::guard('admin')->user()->email}}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li> 
                        <form method="POST" action="{{ route('adminlogout') }}">
                        @csrf
                        <button class="btn dropdown-item" href='/admin.logout'> {{ __('Log Out') }}</button>
                       
                      </form>
                    </li>
                  
                    </ul>
                  </li>
                  @endauth
                </ul>
               
              </div>
            </div>
          </nav>
    </header>
    @yield('allproduct')
    @yield('customerdata')
    @yield('producteditform')
    @yield('productinsert')
    @yield('profile')
    <div class="footer" style="background-color: #232f3e;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center text-light py-2">
               <p class="user-select-none mt-3"><i class="far fa-copyright"></i> 2022 Susan Paudel | All Copyrights reserved</p>
          </div>
      </div>
       </div>
    </div>
   
     
 
   
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>