@extends('Layout')
@section('cd')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>CDs</h1>
            <hr style="height:5px;background:#232f3e;">
        </div>
    </div>
    <div class="row">
    @if(count($data)>=1)
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
     @else
         <h1>No Related Product Found... </h1>
     @endif
    </div>
  
</div> 
{{ $data->links() }} 
<style>
  .w-5{
    height:20px;
    width:20px;
  }

  </style>
@endsection
