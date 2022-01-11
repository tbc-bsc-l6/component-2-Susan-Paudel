<!--extends layout-->
@extends('Layout')
<!--section searched-->
@section('searched')
<!--if $data has more than one data-->  
@if(count($data)>=1)
<div class="container py-5">
    <div class="row">
        <div class="col">
            <!--search product header-->
            <h1 class="py-3">Searched Product</h1>
           
        </div>
        <div class="col mt-4">
            <!--form-->
          <form action="/searchedProduct" method="get" class="d-flex justify-content-end">
              <!--dropdown-->
              <div class="me-2"> 
                <select class="form-select" name="sortBy" aria-label="Default select example">
                    <option value="" selected>Sort The Product</option>
                    <option value="author">By Author</option>
                    <option value="price">By Price</option>
                </select>

              </div>
              <!--button-->
              <button type="submit" class="btn btn-secondary">Sort</button>
          </form>
            
        </div>
        <!--display line-->
        <div class="bigline"></div>
    </div>
        
        <div class="row py-5">
            <!--session message-->
            @if (Session::has('message'))
            <div class="alert alert-info text-center">{{ Session::get('message') }}</div>
        @endif
        <!--disply collection of data-->
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
        <!--pagination link-->
        {{ $data->links() }}
      
</div>
<!--else-->
@else
<!--search product header-->
<div class="container pt-5">
    <div class="shopCard">
        <h1 id="htmltr1" >Search Product</h1>
    </div>
  
    <br>
    <br>
    <br>
  
    <!--cannot found content-->
    <div class="emtycaed" id="empty">
        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <br>
        <h1>Sorry ! we cannot found seached product</h1>
        <p>If you like to search related product then click the button</p>
        <div class="btns">
            <button class="btn btn-secondary">Return To Shop</button>
        </div>
    </div>
  
  </div>
<!--end id-->  
@endif
<!--end section-->
@endsection