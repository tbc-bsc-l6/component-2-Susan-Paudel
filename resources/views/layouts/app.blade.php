<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="/css/style.css">
        <link href="{{asset('/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('/js/app.js') }}"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="">
            @include('own.nav')

            <!-- Page Heading -->
            <div class="py-4 container">
                <header class="bg-white shadow ">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                      <div class="py-3 ps-1"> 
                        <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <button class="btn btn-secondary" href='/logout'> {{ __('Log Out') }}</button>
                         
                        </form>
                         </div>
                       <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="/profileupdate" class="shadow p-4">
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
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com" value="{{$fetchcustomer->email}}">
                                        <span class="error">@error('email'){{$message}}  @enderror</span>
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label for="accountName" class="form-label">Account Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Your Name" name="name" value="{{$fetchcustomer->name}}">
                                        <span class="error">@error('name'){{$message}}  @enderror</span>
                                      </div>
                                        <div class="mb-3 col-md-6">
                                          <label for="Location" class="form-label">Location</label>
                                          <input type="text" class="form-control" placeholder="Enter Your Full Address" name="location" value="{{$fetchcustomer->location}}">
                                          <span class="error">@error('location'){{$message}}  @enderror</span>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                          <label for="phonenumber" class="form-label">Phone Number</label>
                                          <input type="text" class="form-control" placeholder="Enter Your Phone number" name="phonenumber" value="{{$fetchcustomer->phonenumber}}">
                                          <span class="error">@error('phonenumber'){{$message}}  @enderror</span>
                                        </div>
                                      
                                  </div>
                                  <button type="submit" class="btn mb-3" style="background: #232f3e;
                                  color:white;">Save</button>
                                 
                                 
                                </form>   
                        </div>
                       
                    </div>
                </header>
               
            </div>
           

            <!-- Page Content -->
          
            @include('own.footer')
        </div>
        <script src={{asset('/bootstrap/js/bootstrap.bundle.min.js')}}></script>
    </body>
</html>
