<!--extends adminLayout -->
@extends('adminLayout')
<!--product insert section-->
@section('productinsert')
@section('title'){{ 'Product Insert' }}
@endsection
<!--display form for storing product -->
<div class="container py-3">
    <form method="POST" action="/insertform" class="shadow addproduct" enctype="multipart/form-data">
        <!-- make hidden input type for token-->
        @csrf
        <!-- add new product text-->
        <h1>add new product</h1>
        <div class="mb-3">
            <!-- <div class="alert alert-success" role="alert">
                A simple success alert—check it out!
              </div>-->
        </div>
        <div class="row">
            <!--Product Type dropdown -->
            <div class="mb-3 col-md-6">
                <label class="form-label">Product Type:</label>
                <select class="form-select" name="type" aria-label="Default select example" required>
                    <option value="choose" selected>-- Choose Product Type --</option>
                    <option value="cd">CD</option>
                    <option value="game">GAME</option>
                    <option value="book">BOOK</option>
                </select>
                <!--error message -->
                @error('type')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <!--first name -->
            <div class="col-md-6 mb-3">
                <label for="fname" class="form-label">First Name: </label>
                <input type="text" class="form-control" id="fname" aria-describedby="firstname" name="Firstname"
                    required>
                <!--error message -->
                @error('Firstname')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <!--Main name /surname -->
            <div class="col-md-6 mb-3">
                <label for="Main" class="form-label">Main Name/ Surname: </label>
                <input type="text" class="form-control" id="Main" aria-describedby="Surname" name="Surname" required>
                <!--error message -->
                @error('Surname')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <!--title -->
            <div class="col-md-6 mb-3">
                <label for="Title" class="form-label">Title: </label>
                <input type="text" class="form-control" id="Title" aria-describedby="Title" name="Title" required>
                <!--error message -->
                @error('Title')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <!--pages/duration/pegi -->
            <div class="col-md-6 mb-3">
                <label for="fname" class="form-label">Pages/Duration/PEGI: </label>
                <input type="text" class="form-control" id="pdp" aria-describedby="emailHelp" name="PagesDurationPEGI"
                    required>
                <!--error message -->
                @error('PagesDurationPEGI')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <!--Price -->
            <div class="col-md-6 mb-3">
                <label for="price" class="form-label">Price: </label>
                <input type="text" class="form-control" id="price" aria-describedby="price" name="Price" required>
                <!--error message -->
                @error('Price')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <!--Add Images -->
            <div class="col-md-6 mb-3">
                <label for="file" class="form-label">Add Images: </label>
                <input type="file" class="form-control" id="file" aria-describedby="file" name="image"
                    placeholder="Choose Image" required>
                <!--error message -->
                @error('image')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <!--Button to insert -->
        <button type="submit" class="btn mb-3 ms-auto" style="background: #232f3e;
        color:white;">Add Product</button>
        <!--end form -->
    </form>

</div>
<!--end section-->
@endsection
