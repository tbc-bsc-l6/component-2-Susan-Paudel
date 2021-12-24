@extends('Layout')
@section('content')
<div class="container py-3">
    <form method="POST" action="" class="shadow addproduct">
        <h1>add new product</h1>
        <div class="mb-3">
             <!-- <div class="alert alert-success" role="alert">
                A simple success alert—check it out!
              </div>-->
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <label class="form-label">Product Type:</label>
                <select class="form-select" name="type" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="cd">CD</option>
                    <option value="game">GAME</option>
                    <option value="book">BOOK</option>
                  </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="fname" class="form-label">First Name: </label>
                <input type="text" class="form-control" id="fname" aria-describedby="firstname" name="Firstname">
            </div>
            <div class="col-md-6 mb-3">
                <label for="Main" class="form-label">Main Name/ Surname: </label>
                <input type="text" class="form-control" id="Main" aria-describedby="Surname" name="Surname">
            </div>
            <div class="col-md-6 mb-3">
                <label for="Title" class="form-label">Title: </label>
                <input type="text" class="form-control" id="Title" aria-describedby="Title" name="Title">
            </div>
            <div class="col-md-6 mb-3">
                <label for="fname" class="form-label">Pages/Duration/PEGI: </label>
                <input type="text" class="form-control" id="pdp" aria-describedby="emailHelp" name="PagesDurationPEGI">
            </div>
            <div class="col-md-6 mb-3">
                <label for="price" class="form-label">Price: </label>
                <input type="text" class="form-control" id="price" aria-describedby="price" name="Price">
            </div>

        </div>
        
        
        <button type="submit" class="btn mb-3 ms-auto" style="background: #232f3e;
        color:white;">Add Product</button>
      </form>   

</div>

@endsection