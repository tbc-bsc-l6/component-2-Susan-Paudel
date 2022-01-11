<!--layout -->
@extends('Layout')
<!--section navbody -->
@section('navbody')
<!--image carousel -->
<div id="carouselExampleFade" class="carousel slide carousel-fade pb-3" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!--carousel images -->
      <div class="carousel-item active">
        <img src="{{asset('images/slider1.jpg')}}" class="d-block w-100 img-fluid" alt="slider1">
          <!--carousel Caption -->
        <div class="carousel-caption d-none d-md-block">
          <h2>GET YOUR FAVOURITE BOOKS!</h2>
          <p>All Sorts Of Books Available From Trending Authors</p>
        </div>
      </div>
      <div class="carousel-item">
          <!--carousel images -->
        <img src="{{asset('images/slider2.jpg')}}" class="d-block w-100 img-fluid" alt="slider2">
          <!--carousel Caption -->
        <div class="carousel-caption d-none d-md-block">
          <h2>GET YOUR FAVOURITE GAMES!</h2>
          <p>Shop The Games That Will Blow Your Mind</p>
        </div>
      </div>
      <div class="carousel-item">
          <!--carousel images -->
        <img src="{{asset('images/slider3.jpg')}}" class="d-block w-100 img-fluid" alt="slider3">
          <!--carousel Caption -->
        <div class="carousel-caption d-none d-md-block">
          <h2>GET YOUR FAVOURITE CDS!</h2>
          <p>Listen To Heavenly Music From Your Nearest Store </p>
        </div>
      </div>
    </div>
      <!--carousel next button -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
      <!--carousel next  button -->
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
  <!--Our products -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <h1 class="text-center py-3">OUR PRODUCTS</h1>
            <div class="bigline"></div>
        </div>
    </div>
    <div class="row our-product py-5">
        <div class="col-md-4 justify-content-center d-flex py-5">
            <a href="{{route('book')}}"><img src="{{asset('Images/icones/open-book.png')}}" alt="img-fluid"></a>
        </div>
        <div class="col-md-4 justify-content-center d-flex py-5">
            <a href="{{route('cd')}}"><img src="{{asset('Images/icones/cd-player.png')}}" class="mt-3" alt="img-fluid"></a>
        </div>
        <div class="col-md-4 justify-content-center d-flex py-5">
            <a href="{{route('game')}}"><img src="{{asset('Images/icones/game-console.png')}}" class="mt-3" alt="img-fluid"></a>
        </div>
    </div>
        
    
</div>
  <!--end our products -->


  <!--All products-->
<div class="container py-5">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <!--header of all products-->
            <h1 class="text-center py-3">All PRODUCTS</h1>
              <!--display line -->
            <div class="bigline"></div>
        </div>
    </div>
    
        <div class="row py-5">
            <!--session message-->
          @if (Session::has('message'))
               <div class="alert alert-info text-center">{{ Session::get('message') }}</div>
          @endif
          <!--display the collection of data -->
          @foreach ($data as $item)
          <div class="col-md-3 py-2 col-sm-6 col-xs-12">
            <a href="/details/{{$item->id}}" style="text-decoration: none;color:gray;">
                 <div class="card shadow">
                  <?php $image = str_replace('public/images\\', '', $item->Image) ?>
                  <img class="img-fluid d-block w-100" src={{ "/images/" . $image }}
                      style="height: 250px;" alt="product image">
                     <div class="card-body">
                       <h5 class="card-title">{{$item->mainname}}</h5>
                       <p class="card-text user-select-none">{{$item->title}}</p>
                       <div class="info d-flex justify-content-between">
                           <p class="user-select-none">{{$item->pdp}}</p>
                           <p class="user-select-none">&#163;{{$item->price}}</p>
                       </div>
                      
                       <form action="/addtocart" method="POST">
                        @csrf
                        <input type="hidden" value="{{$item->id}}" name='product_id'>
                       <button class="btn btn-warning w-100">Add To Cart<i class="fa fa-shopping-cart ms-1 mt-1" aria-hidden="true"></i></button>
                      </form>
                     </div>
                </div>   
              </a>
          </div>
         @endforeach
         <!--end foreach-->
        </div>
        <!--pagination link -->
        {{ $data->links() }}
      
</div>
    


  <!--contact form-->
<div class="container py-4">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <!--header contact us -->
                <h1 class="text-center py-3">Contact Us</h1>
                <div class="bigline"></div>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-md-6 pt-2">
                <!--session message -->
              @if(Session::has('emailsent'))
              <div class="alert alert-success" role="alert">
                {{Session::get('emailsent')}}
              </div>
              @endif
                <!--form-->
                  <div class="form row">
                    <form action="/emailsend" method="POST">
                      @csrf
                        <div class="col-12 mb-2">
                            <!--Full Name -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Full Name" name="fullname" required>
                                <label for="floatingInput">Full Name</label>
                                  <!--error message -->
                                @error('fullname')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                              </div>
                        </div>
                        <div class="col-12 mb-2">
                           <!--Email Address -->
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
                                <label for="floatingInput">Email Address</label>
                                  <!--error message -->
                                @error('email')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                              </div>
                        </div>
                        <div class="col-12 mb-2">
                           <!--Title -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Title" name="title" required>
                                <label for="floatingInput">Title</label>
                                  <!--error message -->
                                @error('title')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                              </div>
                        </div>
                       <div class="col-12 mb-2">
                          <!--Your Message -->
                         <div class="form-floating">
                             <textarea class="form-control" placeholder="Your Messages" id="floatingTextarea" name="message" required></textarea>
                             <label for="floatingTextarea">Your Messages</label>
                              <!--error message -->
                             @error('message')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                           </div>
                       </div>
                        <!--button for send -->
                       <button class="btn btn-secondary" type="submit">Send</button>
                    </form>
                    <!--end form -->
                 </div>
            </div>
              <!--support message-->
            <div class="col-md-6 pt-2 contect_section">
               <div class="card shadow p-3">
                   <h2 class="text-center">Meet Our Support Team</h2>
                   <hr>
                   <div class="pt-3">
                       <!--image display -->
                     <img src="{{asset('Images/icones/contact.jpg')}}" alt="img" class="img-fluid">
                     <p class="text-blod py-2">Susan Paudel</p>
                   </div>
                  
               </div>
            </div>
        </div>
       
</div>
  <!--end conatct form -->
<!--Newsletter start -->
<div class="newsletter py-5" style="background:rgb(223, 226, 228);">
  <div class="container py-5">
    <div class="row justify-content-center text-center">
        <h1>Stay in touch with the latest products</h1>
        <i class="fa fa-envelope fa-5x" aria-hidden="true"></i>
        <p>Promise to keep the inbox clean. No bugs.</p>
          <!--Session message -->
        @if (Session::has('success'))
        <div class="alert alert-info" role="alert">
         {{Session::get('success')}}
        </div>
        @endif
          <!--form -->
        <form action="/newsletter" method="POST" class="d-flex justify-content-center py-3">
            <!--generate token -->
          @csrf
          <input type="email" class="form-control" name="email_address" placeholder="Your email address" style="width:40%;" required>
            <!--button-->
          <button type="submit" class="btn btn-primary">SUBSCRIBE</button>
        
       
        </form>
          <!--end form-->
        <div>
            <!--session message-->
          @error('email_address')
          <span style="color:red">{{$message}}</span>
      @enderror
        <!--session message-->
      @error('email_address')
      <span style="color:red">{{$message}}</span>
      @enderror
        </div>
    </div>
  </div>
</div>
@endsection
  <!--end section -->
