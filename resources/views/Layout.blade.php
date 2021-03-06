<!--php code-->
<?php
//use cartcontroller
use App\Http\Controllers\cartController;
//set initial value
$total = 0;
//if login
if (auth()->user()) {
    //store the value to total from countcartitem function
    //static function
    $total = cartController::countcartitem();
}

?>
<!DOCTYPE html>
<html lang="en">
<!--head-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--link css-->
    <link rel="stylesheet" href="/css/style.css">
    <!--link font awsome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!--link bootstrap css-->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--link font-->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <!--title-->
    <title>@yield('title')</title>
</head>
<!--end head-->

<body>
    <!--nav sticky top-->
    <header class="sticky-top">
        <div class="container-fluid bg-dark text-white ">
            <div class="container">
                <div class="row py-1 d-flex justify-content-between">
                    <div class="col-md-6">
                        <div class="register_link">
                            <!--if guest access then-->
                            @guest
                                <span>If you are new user then <a href="{{ route('register') }}"
                                        style="color: white;">Register</a></span>
                            @endguest
                            <!--end guest-->
                            <!--if user access-->
                            @auth
                                <span>Welcome back {{ Auth::user()->name }} </span>
                            @endauth
                            <!--end auth-->
                        </div>

                    </div>
                    <!--social links-->
                    <div class="col-md-6 nav_social_link d-none d-md-block">
                        <div class="d-flex justify-content-end">
                            <a href="https://www.facebook.com/TheBritishCollege" target="_blank"><span><i
                                        class="fab fa-facebook px-1"></i></span></a>
                            <a href="https://www.instagram.com/thebritishcollege/" target="_blank"><span><i
                                        class="fab fa-instagram px-1"></i></span></a>
                            <a href="https://twitter.com/TBritishcollege" target="_blank"><span><i
                                        class="fab fa-twitter px-1"></i></span></a>
                            <a href="https://www.google.com/maps/place//data=!4m2!3m1!1s0x39eb19b19295555f:0xabfe5f4b310f97de?source=g.page.default"
                                target="_blank"><span><i class="fab fa-google-plus px-1"></i></span></a>
                        </div>

                    </div>
                    <!--end socail links-->
                </div>
            </div>
        </div>
        <!--nav bar-->
        <div class="nav_bar">
            <nav class="navbar navbar-expand-lg navigation navbar-dark py-4">
                <!--container-->
                <div class="container">
                    <!--navbar brand-->
                    <a class="navbar-brand" href="/"
                        style="font-family: 'Lobster', cursive;font-size:30px;">leedsshop</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-none d-md-block px-5 w-100">
                            <form action="/searchedProduct" method="GET" class="input-group">
                                <input type="text" class="form-control" aria-label="Text input with dropdown button"
                                    placeholder="Search for Products" name="search" value="{{ request('search') }}"
                                    required>
                                <button class="btn btn-outline-light" type="submit"
                                    aria-expanded="false">Search</button>

                            </form>
                        </div>
                        <!--nav items-->
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                            <li class="nav-item">
                                <a class="nav-link a" aria-current="page" href="{{ route('book') }}">BOOK</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link a" href="{{ route('cd') }}">CD</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link a" href="{{ route('game') }}">GAME</a>
                            </li>
                            <!--if auth-->
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="d-inline-block text-truncate" style="max-width: 80px;"> <i
                                                class="fa fa-user" style="color:green;"
                                                aria-hidden="true"></i>{{ Auth::user()->name }}</span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li>
                                            <a class="btn dropdown-item" href="{{ route('userprofile') }}">Dashboard</a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button class="btn dropdown-item" href='/logout'>
                                                    {{ __('Log Out') }}</button>

                                            </form>
                                        </li>

                                    </ul>
                                </li>
                            @endauth
                            <!--end auth-->
                            <!--guest access-->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link active d-flex" aria-current="page" href="{{ route('login') }}"><i
                                            class="fa fa-user mt-1" aria-hidden="true"></i><span>SignIn</span></a>
                                </li>
                            @endguest
                            <!--end guest-->
                            <li class="nav-item">
                                <a class="nav-link d-flex active" href="{{ route('cart') }}"><i
                                        class="fa fa-shopping-cart mt-1"
                                        aria-hidden="true"></i><span>Cart</span><span>({{ $total }})</span></a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
    </header>
    <div class="container" id="nav">
        <div class="col-12 pt-3 pb-3 d-md-none">
            <!--form for searching product-->
            <form action="/searchedProduct" method="GET" class="input-group">
                <input type="text" class="form-control" aria-label="Text input with dropdown button"
                    placeholder="Search for Products" name="search" value="{{ request('search') }}">
                <!--button for submit search-->
                <button class="btn btn-secondary" type="submit" aria-expanded="false">Search</button>
            </form>
            <!--end form-->


        </div>
    </div>
    </div>
    <!--end nav-->

    <!--yeild the content of balde file-->
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
    @yield('productlist')
    <!--end yeild content-->

    <!--footer-->
    <div class="container-fluid footer">
        <div class="container">
            <div class="col-md-12 section-1 pt-3">
                <!--back to top link-->
                <a href="#nav">
                    <p class="text-center py-2 text-white text-uppercase">BACK TO TOP</p>
                </a>
            </div>
            <!--nav body-->
            <div class="row text-white justify-content-between d-flex">
                <!--our services-->
                <div class="col-md-3 py-4">
                    <h5 class="pb-3">OUR SERVICES</h5>
                    <P class="point"><a href="{{ route('cd') }}">Cd</a></p>
                    <p class="point"><a href="{{ route('book') }}">Book</a></p>
                    <p class="point"><a href="{{ route('game') }}">Game</a></p>
                </div>
                <!--end our services-->
                <!--contact us-->
                <div class="col-md-3 py-4">
                    <h5 class="pb-3 point"><a href="#contact" style="text-decoration: none; color:white;">CONTACT
                            US</a></h5>
                    <P class="point"><i class="fa fa-phone me-1" aria-hidden="true"></i> 01-6698772</p>
                    <p class="point"><i class="fa fa-map-marker me-1" aria-hidden="true"></i>Thapathali,
                        Kathmandu<br></p>
                    <p class="point"><i class="fa fa-envelope me-1" aria-hidden="true"></i>
                        info@thebritishcollege.edu.np</p>

                </div>
                <!--end contact us-->
                <!--social media-->
                <div class="col-md-3 py-4">
                    <div>
                        <h5 class="pb-3">SOCIAL MEDIA</h5>
                        <a href="https://www.facebook.com/TheBritishCollege" target="_blank"><span><i
                                    class="fab fa-facebook fa-2x "></i></span></a>
                        <a href="https://www.instagram.com/thebritishcollege/" target="_blank"><span><i
                                    class="fab fa-instagram fa-2x px-2"></i></span></a>
                        <a href="https://twitter.com/TBritishcollege" target="_blank"><span><i
                                    class="fab fa-twitter fa-2x px-2"></i></span></a>
                        <a href="https://www.google.com/maps/place//data=!4m2!3m1!1s0x39eb19b19295555f:0xabfe5f4b310f97de?source=g.page.default"
                            target="_blank"><span><i class="fab fa-google-plus fa-2x"></i></span></a>
                    </div>


                </div>
                <!--social media end-->
                <!--location map-->
                <div class="col-md-3 py-4">
                    <h5 class="pb-3 point"><a href="#about" style="text-decoration: none; color:white;">LOCATION</a>
                    </h5>
                    <div style="width: 100%"><iframe width="100%" height="200" frameborder="0" scrolling="no"
                            marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=british%20college,nepal+(M)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                                href="https://www.gps.ie/car-satnav-gps/">best car gps</a></iframe></div>
                </div>
                <!--location map end-->
                <!--copy right content-->
                <div class="col-md-12" style="border-top:1px solid white;">
                    <div class="row py-1">
                        <div class="col text-center">
                            <p class="user-select-none mt-3"><i class="far fa-copyright"></i> {{ date('Y') }} Susan
                                Paudel | All Copyrights reserved</p>
                        </div>
                    </div>
                </div>
                <!--end copyright content-->

            </div>

        </div>
    </div>


    </div>
    </div>
    <!--script that link boostrap js file-->
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
<!--end body-->

</html>
