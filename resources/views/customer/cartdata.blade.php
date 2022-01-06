@extends('Layout')
@section('content')
@if(count($product)>=1)
<div class="container py-5">
  @if(Session::has('success'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{Session::get('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  @endif
  <div class="table-responsive">
   <table class="table table-dark text-center">
    <thead>
      <tr>
        <th scope="col">Image</th>
        <th scope="col">Producttype</th>
        <th scope="col">Title</th>
        <th scope="col">Artists/Author/Console</th>
        <th scope="col">Price</th>
       
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($product as $item)
        <tr>
            <td><img src="{{asset('/images/'.$item->Image)}}" style="height: 100px;width:100px;"></td>
            <td class="align-middle">{{$item->producttype}}</td>
            <td class="align-middle">{{$item->title}}</td>
            <td class="align-middle">{{$item->firstname}}</td>
            <td class="align-middle">&#163;{{$item->price}}</td>
            <td><a href="/removecartdata/{{$item->cart_id}}"><button class="btn btn-danger mt-4">Remove</button></a></td>
          </tr>
            
        @endforeach
     
    </tbody>
  </table> 
  

</div>
<a class="btn btn-secondary" href="/order">Check Order</a>
</div>
    
@else
    




<div class="container pt-5">
  <div class="shopCard">
      <h1 id="htmltr1" >Shopping Cart</h1>
  </div>

  <br>
  <br>
  <br>


  <div class="emtycaed" id="empty">
      <i class="fas fa-shopping-cart"></i> <br>
      <h1>YOUR SHOPPING CART IS EMPTY</h1>
      <p>We invite you to get acquainted with an assortment of our shop.Surely you can find something for <br>
          yourself!</p>
      <div class="btns">
          <button class="btn btn-secondary">Return To Shop</button>
      </div>
  </div>

</div>
@endif 
@endsection