@extends('Layout')
@section('navbody')
<div id="carouselExampleFade" class="carousel slide carousel-fade pb-3" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('images/slider1.jpg')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/slider2.jpg')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/slider3.jpg')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container py-4">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <h1 class="text-center py-3">OUR PRODUCTS</h1>
            <div class="bigline"></div>
        </div>
    </div>
    <div class="row our-product py-5">
        <div class="col-md-4 justify-content-center d-flex">
            <a href=""><img src="{{asset('Images/icones/open-book.png')}}" alt="img-fluid"></a>
        </div>
        <div class="col-md-4 justify-content-center d-flex">
            <a href=""><img src="{{asset('Images/icones/cd-player.png')}}" class="mt-3" alt="img-fluid"></a>
        </div>
        <div class="col-md-4 justify-content-center d-flex">
            <a href=""><img src="{{asset('Images/icones/game-console.png')}}" class="mt-3" alt="img-fluid"></a>
        </div>
    </div>
        
    
</div>



<div class="container py-4">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <h1 class="text-center py-3">All PRODUCTS</h1>
            <div class="bigline"></div>
        </div>
    </div>
    
        <div class="row py-5">
          @foreach ($data as $item)
          <div class="col-md-3 py-2 col-sm-6 col-xs-12">
                 <div class="card shadow">
                     <img src="{{asset('/images/'.$item->Image)}}" style="height:250px;" class="card-img-top p-1" alt="...">
                     <div class="card-body">
                       <h5 class="card-title">{{$item->mainname}}</h5>
                       <p class="card-text user-select-none">{{$item->title}}</p>
                       <div class="info d-flex justify-content-between">
                           <p class="user-select-none">{{$item->pdp}}</p>
                           <p class="user-select-none">&#163;{{$item->price}}</p>
                       </div>
                       <a href="#" class="btn btn-warning w-100">Add To Cart<i class="fa fa-shopping-cart ms-1 mt-1" aria-hidden="true"></i></a>
                     </div>
                </div>   
            
          </div>
         @endforeach
        </div>
      
</div>
    



<div class="container py-4">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h1 class="text-center py-3">Contact Us</h1>
                <div class="bigline"></div>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-md-6 pt-2">
                <div class="form row">
                    <form action="" method="POST">
                        <div class="col-12 mb-2">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Full Name">
                                <label for="floatingInput">Full Name</label>
                              </div>
                        </div>
                        <div class="col-12 mb-2">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                              </div>
                        </div>
                        <div class="col-12 mb-2">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Title">
                                <label for="floatingInput">Title</label>
                              </div>
                        </div>
                       <div class="col-12 mb-2">
                         <div class="form-floating">
                             <textarea class="form-control" placeholder="Your Messages" id="floatingTextarea"></textarea>
                             <label for="floatingTextarea">Your Messages</label>
                           </div>
                       </div>
                       <button class="btn btn-secondary">Send</button>
                    </form>
                 </div>
            </div>
            <div class="col-md-6 pt-2 contect_section">
               <div class="card shadow p-3">
                   <h2>Meet Our Brillent And Knowledgeable Support Team</h2>
                   <hr>
                   <div class="pt-3">
                     <img src="{{asset('Images/phpA5CB.tmp.jpg')}}" alt="img" class="img-fluid">
                     <p class="text-blod py-2">Susan Paudel</p>
                   </div>
                  
               </div>
            </div>
        </div>
       
</div>
@endsection
