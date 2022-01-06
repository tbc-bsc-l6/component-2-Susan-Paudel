@extends('Layout')
@section('book')
<div class="container py-5">
    <div class="row">
        <div class="col-12 py-2">
            <h1>Books</h1>
            <hr style="height:5px;background:#232f3e;">
        </div>
    </div>
    <div class="row">
      @if (Session::has('message'))
      <div class="alert alert-info text-center">{{ Session::get('message') }}</div>
 @endif
     @if (count($data)>=1)
       @foreach ($data as $item)
        <div class="col-md-3 py-2 col-sm-6 col-xs-12">
          <a href="/details/{{$item->id}}" style="text-decoration: none;color:gray;">
            <div class="card shadow">
                <img src="{{asset('/images/'.$item->Image)}}" style="height:250px;" class="card-img-top p-1" alt="product_img">
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
     @else
         <h1>No Related Product Found... </h1>
     @endif
    </div>
    {{ $data->links() }}
  </div>  
@endsection