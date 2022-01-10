@extends('Layout')
@section('productdetails')
<div class="container py-5">
    <div class="card mb-3 shadow">

        <div class="row">
          @if (Session::has('message'))
          <div class="alert alert-info text-center">{{ Session::get('message') }}</div>
     @endif
          <div class="col-md-5">
            <?php $image = str_replace('public/images\\', '', $detail->Image) ?>
            <img class="img-fluid d-block w-100 p-2" src={{ "/images/" . $image }}
                style="width:100%;height:400px;" alt="product image">
          </div>
          <div class="col-md-7 border-start">
            <div class="card-body">
              <h3 class="card-title fw-bold">{{$detail->title}}</h3>
              <p class="card-text">Product Type: {{$detail->producttype}}</p>
              <p class="card-text">First Name: {{$detail->firstname}}</p>
              <p class="card-text">Main Name: {{$detail->mainname}}</p>
              <p class="card-text">Pages/PEGI/Duration: {{$detail->pdp}}</p>
               <p class="card-text">Price: &#163;{{$detail->price}}</p>
               <form action="/addtocart" method="POST">
                @csrf
                <input type="hidden" value="{{$detail->id}}" name='product_id'>
                <div class="d-flex justify-content-center border-top pt-5">
                  <button class="btn btn-primary w-50">Add To Cart<i class="fa fa-shopping-cart ms-1 mt-1" aria-hidden="true"></i></button>
                </div>
             
              </form>

            </div>
          </div>
        </div>
      </div>

</div>

@endsection