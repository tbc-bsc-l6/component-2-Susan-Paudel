@extends('Layout')
@section('content')
<div class="container">
  <div class="row">
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
                 <form action="/addtocart" method="POST">
                   @csrf
                   <input type="hidden" value="{{$item->id}}">
                  <button class="btn btn-warning w-100">Add To Cart<i class="fa fa-shopping-cart ms-1 mt-1" aria-hidden="true"></i></button>
                 </form>
                
               </div>
          </div>   
      
    </div>
   @endforeach
  </div>

</div>


   
    

   
@endsection