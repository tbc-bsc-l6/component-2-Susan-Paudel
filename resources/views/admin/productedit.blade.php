 <!--extends adminlayout -->
 @extends('adminLayout')
 <!-- section producteditform-->
 @section('producteditform')
 @section('title'){{ 'Product Edit' }}
 @endsection
 <!--display form that display the product details with choosen product id -->
 <div class="container py-3">
     <!--form to edit the details -->
     <form method="POST" action="/edit/{{ $editdata->id }}" class="shadow addproduct" enctype="multipart/form-data">
         <!-- cross side request forgery make hidden input type token-->
         @csrf
         <!--put method is called -->
         @method('PUT')
         <!--display edit product-->
         <h1>Edit product</h1>
         <!--if error exist with the form then error message display -->
         @if (Session::has('error'))
             <div class="mb-3">
                 <div class="alert alert-warning" role="alert">
                     <!--display error messsage-->
                     {{ Session::get('error') }}
                 </div>
             </div>
             <!--end if -->
         @endif
         <!--hidden input type which take id -->
         <input type="hidden" name="id" value="{{ $editdata->id }}">
         <div class="row">
             <!-- dropdown for product type-->
             <div class="mb-3 col-md-6">
                 <label class="form-label">Product Type:</label>
                 <select class="form-select" name="type" aria-label="Default select example"
                     value="{{ $editdata->producttype }}">
                     <option value="{{ $editdata->producttype }}" selected>{{ $editdata->producttype }}</option>
                 </select>
                 <!-- display error-->
                 @error('type')
                     <span style="color:red">{{ $message }}</span>
                 @enderror
             </div>
             <!--First name -->
             <div class="col-md-6 mb-3">
                 <label for="fname" class="form-label">First Name: </label>
                 <input type="text" class="form-control" id="fname" aria-describedby="firstname" name="Firstname"
                     value="{{ $editdata->firstname }}" required>
                 <!-- display error-->
                 @error('Firstname')
                     <span style="color:red">{{ $message }}</span>
                 @enderror
             </div>
             <!-- Main Name/Surname-->
             <div class="col-md-6 mb-3">
                 <label for="Main" class="form-label">Main Name/ Surname: </label>
                 <input type="text" class="form-control" id="Main" aria-describedby="Surname" name="Surname"
                     value="{{ $editdata->mainname }}" required>
                 <!-- display error-->
                 @error('Surname')
                     <span style="color:red">{{ $message }}</span>
                 @enderror
             </div>
             <!--Title-->
             <div class="col-md-6 mb-3">
                 <label for="Title" class="form-label">Title: </label>
                 <input type="text" class="form-control" id="Title" aria-describedby="Title" name="Title"
                     value="{{ $editdata->title }}" required>
                 <!-- display error-->
                 @error('Title')
                     <span style="color:red">{{ $message }}</span>
                 @enderror
             </div>
             <!--Pages/Duration/PEGI -->
             <div class="col-md-6 mb-3">
                 <label for="fname" class="form-label">Pages/Duration/PEGI: </label>
                 <input type="text" class="form-control" id="pdp" aria-describedby="emailHelp"
                     name="PagesDurationPEGI" value="{{ $editdata->pdp }}" required>
                 <!-- display error-->
                 @error('PagesDurationPEGI')
                     <span style="color:red">{{ $message }}</span>
                 @enderror
             </div>
             <!--price -->
             <div class="col-md-6 mb-3">
                 <label for="price" class="form-label">Price: </label>
                 <input type="text" class="form-control" id="price" aria-describedby="price" name="Price"
                     value="{{ $editdata->price }}" required>
                 <!-- display error-->
                 @error('Price')
                     <span style="color:red">{{ $message }}</span>
                 @enderror
             </div>
             <!-- Add Images-->
             <div class="col-md-6 mb-3">
                 <label for="file" class="form-label">Add Images: </label>
                 <input type="file" class="form-control" id="file" aria-describedby="file" name="image"
                     placeholder="Choose Image" required>
                 <!-- display error-->
                 @error('image')
                     <span style="color:red">{{ $message }}</span>
                 @enderror
             </div>

         </div>

         <!--Button for update-->
         <button type="submit" class="btn mb-3 ms-auto" style="background: #232f3e;
        color:white;">Update</button>
         <!-- end form-->
     </form>

 </div>
 <!--end section -->
@endsection
