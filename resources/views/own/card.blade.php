@extends('Layout')
@section('content')

    <div class="col-md-4 p-2">
        <a href="#" style="text-decoration: none;color:black;">
            <div class="card shadow" style="width: 18rem;">
                <img src="https://img.traveltriangle.com/blog/wp-content/uploads/2018/12/cover-for-street-food-in-sydney.jpg" class="card-img-top p-1" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Name of product</h5>
                  <p class="card-text user-select-none">title of the product</p>
                  <div class="info d-flex justify-content-between">
                      <p class="user-select-none">Pages:123</p>
                      <p class="user-select-none">Price:$11</p>
                  </div>
                  <a href="#" class="btn btn-warning w-100">Add To Cart<i class="fa fa-shopping-cart ms-1 mt-1" aria-hidden="true"></i></a>
                </div>
           </div>   
        </a>
    </div>
    

   
@endsection