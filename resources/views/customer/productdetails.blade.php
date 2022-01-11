<!--extend layout -->
@extends('Layout')
<!--section productdetails -->
@section('productdetails')
<!--display details of click product -->
<div class="container py-5">
    <div class="card mb-3 shadow">
       <!--session message -->
        <div class="row">
          @if (Session::has('message'))
          <div class="alert alert-info text-center">{{ Session::get('message') }}</div>
     @endif
     <!--display image of that product -->
          <div class="col-md-5">
            <?php $image = str_replace('public/images\\', '', $detail->Image) ?>
            <img class="img-fluid d-block w-100 p-2" src={{ "/images/" . $image }}
                style="width:100%;height:400px;" alt="product image">
          </div>
          <!--details of the product -->
          <div class="col-md-7 border-start">
            <div class="card-body">
              <h3 class="card-title fw-bold">{{$detail->title}}</h3>
              <p class="card-text">Product Type: {{$detail->producttype}}</p>
              <p class="card-text">First Name: {{$detail->firstname}}</p>
              <p class="card-text">Main Name: {{$detail->mainname}}</p>
              <p class="card-text">Pages/PEGI/Duration: {{$detail->pdp}}</p>
               <p class="card-text">Price: &#163;{{$detail->price}}</p>
               <!--form -->
               <form action="/addtocart" method="POST">
                <!--generate token hidden type -->
                @csrf
                <input type="hidden" value="{{$detail->id}}" name='product_id'>
                <!--button add to cart -->
                <div class="d-flex justify-content-center border-top pt-5">
                  <button class="btn btn-primary w-50">Add To Cart<i class="fa fa-shopping-cart ms-1 mt-1" aria-hidden="true"></i></button>
                </div>
             
              </form>
              <!--end form -->

            </div>
          </div>
        </div>
      </div>

</div>

@endsection
<!--end section -->