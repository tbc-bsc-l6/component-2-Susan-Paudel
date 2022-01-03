@extends('Layout')
@section('productdetails')
<div class="container py-5">
    <div class="card mb-3 shadow">
        <div class="row">
          <div class="col-md-5">
            <img src="{{asset('/images/'.$detail->Image)}}" class="img-fluid p-2" alt="..." style="height:400px;">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <h3 class="card-title">{{$detail->title}}</h3>
              <p class="card-text">Product Type:{{$detail->title}}</p>
              <p class="card-text">First Name:{{$detail->title}}</p>
              <p class="card-text">Main Name:{{$detail->title}}</p>
              <p class="card-text">Pages/PEGI/Duration:{{$detail->title}}</p>
               <p class="card-text">Price:{{$detail->title}}</p>
               <form action="/addtocart" method="POST">
                @csrf
                <input type="hidden" value="{{$detail->id}}">
               <button class="btn btn-primary">Add To Cart<i class="fa fa-shopping-cart ms-1 mt-1" aria-hidden="true"></i></button>
              </form>

            </div>
          </div>
        </div>
      </div>

</div>

@endsection