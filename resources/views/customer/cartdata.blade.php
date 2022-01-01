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
  
   <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Image</th>
        <th scope="col">producttype</th>
        <th scope="col">mainname</th>
        <th scope="col">PagesDurationPEGI</th>
        <th scope="col">firstname</th>
        <th scope="col">price</th>
       
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($product as $item)
        <tr>
            <td><img src="{{asset('/images/'.$item->Image)}}" style="height: 50px;width:50px;"></td>
            <td>{{$item->producttype}}</td>
            <td>{{$item->mainname}}</td>
            <td>{{$item->pdp}}</td>
            <td>{{$item->firstname}}</td>
            <td>&#163;{{$item->price}}</td>
            <td><a href="/removecartdata/{{$item->cart_id}}"><button class="btn btn-danger">Remove</button></a></td>
          </tr>
            
        @endforeach
     
    </tbody>
  </table> 
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