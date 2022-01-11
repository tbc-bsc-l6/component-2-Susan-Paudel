<!--extends layout -->
@extends('Layout')
<!--section content -->
@section('content')
<!--if $product varibale contain more than or equal to one -->
@if(count($product)>=1)
<div class="container py-5">
  <!--session message -->
  @if(Session::has('success'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{Session::get('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  @endif
  <!--bootstrap class to make table responsive -->
  <div class="table-responsive">
    <!--table to display product details -->
   <table class="table table-dark text-center">
    <!--table header -->
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
    <!--end table header-->
    <tbody>
      <!--foreach to display collection of data -->
        @foreach ($product as $item)
        <tr>
            <td> <?php $image = str_replace('public/images\\', '', $item->Image) ?>
              <img class="img-fluid align-middle" src={{ "/images/" . $image }}
                  style="height: 100px;" alt="product image"></td>
            <td class="align-middle">{{$item->producttype}}</td>
            <td class="align-middle">{{$item->title}}</td>
            <td class="align-middle">{{$item->firstname}}</td>
            <td class="align-middle">&#163;{{$item->price}}</td>
            <td><a href="/removecartdata/{{$item->cart_id}}"><button class="btn btn-danger mt-4">Remove</button></a></td>
          </tr>
            
        @endforeach
        <!--end for each -->
     
    </tbody>
  </table> 
  <!--end table -->
  

</div>
<!--link to check the order -->
<a class="btn btn-secondary" href="/order">Check Order</a>
</div>
<!-- else -->
@else
<!--shopping cart is empty will display -->    
<div class="container pt-5">
  <div class="shopCard">
    <!--title -->
      <h1 id="htmltr1" >Shopping Cart</h1>
  </div>

  <br>
  <br>
  <br>

  <!--messages -->
  <div class="emtycaed" id="empty">
      <i class="fas fa-shopping-cart"></i> <br>
      <h1>YOUR SHOPPING CART IS EMPTY</h1>
      <p>We invite you to get acquainted with an assortment of our shop.Surely you can find something for <br>
          yourself!</p>
      <div class="btns">
         <a href="/navbody"> <button class="btn btn-secondary">Return To Shop</button></a>
      </div>
  </div>

</div>
<!--end if -->
@endif 
<!--end section -->
@endsection