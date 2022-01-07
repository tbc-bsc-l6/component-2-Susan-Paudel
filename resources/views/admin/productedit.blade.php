@extends('adminLayout')
@section('producteditform')
<div class="container py-3">
    <form method="POST" action="/edit/{{$editdata->id}}" class="shadow addproduct" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>Edit product</h1>
        @if (Session::has('error'))
        <div class="mb-3">
            <div class="alert alert-warning" role="alert">
                {{Session::get('error')}}
             </div>
       </div>
        @endif
       
        <input type="hidden" name="id" value="{{$editdata->id}}">
        <div class="row">
            <div class="mb-3 col-md-6">
                <label class="form-label">Product Type:</label>
                <select class="form-select" name="type" aria-label="Default select example" value="{{$editdata->producttype}}">
                   <option value="{{$editdata->producttype}}" selected>{{$editdata->producttype}}</option>
                  </select>
                  @error('type')
                  <span style="color:red">{{$message}}</span>
                  @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="fname" class="form-label">First Name: </label>
                <input type="text" class="form-control" id="fname" aria-describedby="firstname" name="Firstname" value="{{$editdata->firstname}}">
                @error('Firstname')
                <span style="color:red">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="Main" class="form-label">Main Name/ Surname: </label>
                <input type="text" class="form-control" id="Main" aria-describedby="Surname" name="Surname" value="{{$editdata->mainname}}">
                @error('Surname')
                <span style="color:red">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="Title" class="form-label">Title: </label>
                <input type="text" class="form-control" id="Title" aria-describedby="Title" name="Title" value="{{$editdata->title}}">
                @error('Title')
                <span style="color:red">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="fname" class="form-label">Pages/Duration/PEGI: </label>
                <input type="text" class="form-control" id="pdp" aria-describedby="emailHelp" name="PagesDurationPEGI" value="{{$editdata->pdp}}">
                @error('PagesDurationPEGI')
                <span style="color:red">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="price" class="form-label">Price: </label>
                <input type="text" class="form-control" id="price" aria-describedby="price" name="Price" value="{{$editdata->price}}">
                @error('Price')
                <span style="color:red">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="file" class="form-label">Add Images: </label>
                <input type="file" class="form-control" id="file" aria-describedby="file" name="image" placeholder="Choose Image">
                @error('image')
                <span style="color:red">{{$message}}</span>
                @enderror
            </div>

        </div>
        
        
        <button type="submit" class="btn mb-3 ms-auto" style="background: #232f3e;
        color:white;">Update</button>
      </form>   

</div>

@endsection