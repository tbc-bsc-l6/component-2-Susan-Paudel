<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <!--head-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!--style-->
        <link rel="stylesheet" href="/css/style.css">
        <link href="{{asset('/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!--font awesome-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('/js/app.js') }}"></script>
    </head>
    <!--endhead-->
    <body class="font-sans antialiased">
        <div class="">
          <!--include nav bar-->
            @include('customer.nav')

            <!-- Page Heading -->
            <div class="py-4 container">
                <header class="bg-white">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                       <div class="row">
                        <div class="col-md-12">
                          <!--form-->
                            <form method="POST" action="/profileupdate" class="shadow p-4">
                              <!--create token-->
                                @csrf
                                @method('PATCH')
                                <!--simple text-->
                                  <h1>Personal Info</h1>
                                  <!--session message-->
                                  @if (Session::has('success'))
                                  <div class="mb-3">
                                     <div class="alert alert-success" role="alert">
                                      {{Session::get('success')}}
                                     </div>
                                  </div> 
                                  @endif
                                  <!--session message-->
                                  @if (Session::has('error'))
                                  <div class="mb-3">
                                     <div class="alert alert-warning" role="alert">
                                      {{Session::get('error')}}
                                     </div>
                                  </div> 
                                  @endif
                                  <div class="row">
                                    <!--Email address-->
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com" value="{{$fetchcustomer->email}}" disabled>
                                      </div>
                                      <!--Account Name-->
                                      <div class="mb-3 col-md-6">
                                        <label for="accountName" class="form-label">Account Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Your Name" name="name" value="{{$fetchcustomer->name}}" required>
                                        <!--error message-->
                                        @error('name')<span class="error">{{$message}} </span> @enderror
                                      </div>
                                       <!--Location-->
                                        <div class="mb-3 col-md-6">
                                          <label for="Location" class="form-label">Location</label>
                                          <input type="text" class="form-control" placeholder="Enter Your Full Address" name="location" value="{{$fetchcustomer->location}}" required>
                                           <!--error message-->
                                          @error('location')<span class="error">{{$message}} </span> @enderror
                                        </div>
                                         <!--Phone Number-->
                                        <div class="mb-3 col-md-6">
                                          <label for="phonenumber" class="form-label">Phone Number</label>
                                          <input type="text" class="form-control" placeholder="Enter Your Phone number" name="phonenumber" value="{{$fetchcustomer->phonenumber}}" required>
                                           <!--error message-->
                                          @error('phonenumber')<span class="error">{{$message}}  </span>@enderror
                                        </div>
                                         <!--New Password-->
                                        <div class="mb-3 col-md-6">
                                          <div class="d-flex justify-content-between">
                                          <label for="phonenumber" class="form-label">New Password</label>
                                          <i class="fa fa-eye" aria-hidden="true" onclick="myFunction()"></i>
                                          </div>
                                          <input type="password" class="form-control" id="password" placeholder="Enter Your New Password" name="password">
                                           <!--error message-->
                                          @error('password')<span class="error">{{$message}}  </span>@enderror
                                        </div>
                                  </div>
                                   <!--button-->
                                  <button type="submit" class="btn mb-3" style="background: #232f3e;
                                  color:white;">Save</button>
                                  <!--end button-->
                                 
                                </form>  
                                 <!--end form--> 
                        </div>
                       
                    </div>
                </header>
               
            </div>
           

            <!-- Page Content -->
           <!--include footer-->
            @include('customer.footer')
        </div>
         <!--script-->
        <script src={{asset('/bootstrap/js/bootstrap.bundle.min.js')}}></script>
        <script>
          //myfunction
          function myFunction() {
            //select password id from input
              var x = document.getElementById("password");
              //eye button is selected then
              if (x.type === "password") {
                //display text as input type
                  x.type = "text";
              } else {
                //display password
                  x.type = "password";
              }
          }
      </script>
       <!--end script-->
    </body>
</html>
