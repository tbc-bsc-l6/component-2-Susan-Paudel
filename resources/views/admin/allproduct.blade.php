 <!-- Extaneds adminlayout -->
 @extends('adminLayout')
 <!-- section name allproduct -->
 @section('allproduct')
 @section('title'){{ 'All Products' }}
 @endsection
 <!-- conatiner -->
 <div class="container py-5">
     <div class="insert_tab d-flex justify-content-between bg-light p-3">
         <!-- insert data text -->
         <div class="insert">
             <h1>Insert data</h1>
         </div>
         <!-- button for add product -->
         <div class="button">
             <a href="/insertform"><button type="button" class="btn btn-outline-dark mt-2">Add Product</button></a>

         </div>
         <!-- end button -->
     </div>
     <!-- If session success is set then -->
     @if (Session::has('success'))
         <div class="alert alert-success" role="alert">
             <!-- display message that is store in success -->
             {{ Session::get('success') }}
         </div>
     @endif
     <!-- end if -->
     <!-- If session success is set then -->
     @if (Session::has('delete'))
         <div class="alert alert-warning" role="alert">
             <!-- display message that is store in success -->
             {{ Session::get('delete') }}
         </div>
     @endif
     <!-- If session update is called -->
     @if (Session::has('updated'))
         <div class="alert alert-success" role="alert">
             <!-- display message store in update variable -->
             {{ Session::get('updated') }}
         </div>
     @endif
     <!-- end if -->
     <!-- table responsive is bootstrap class that make table responsive  -->
     <div class="table-responsive">
         <!-- Table start -->
         <table class="table table-dark">
             <!-- table header -->
             <thead>
                 <tr>
                     <th scope="col">Image</th>
                     <th scope="col">producttype</th>
                     <th scope="col">mainname</th>
                     <th scope="col">PagesDurationPEGI</th>
                     <th scope="col">firstname</th>
                     <th scope="col">title</th>
                     <th scope="col">price</th>
                     <th scope="col" colspan="2">Action</th>

                 </tr>
             </thead>
             <!-- table header close -->
             <!-- table body start -->
             <tbody>
                 <!-- for each loop used to store collection of data -->
                 @foreach ($data as $item)
                     <tr>
                         <!-- table data start -->
                         <td class="align-middle"><img src="{{ asset('/images/' . $item->Image) }}"
                                 style="height: 50px;width:50px;"></td>
                         <td class="align-middle">{{ $item->producttype }}</td>
                         <td class="align-middle">{{ $item->mainname }}</td>
                         <td class="align-middle">{{ $item->pdp }}</td>
                         <td class="align-middle">{{ $item->firstname }}</td>
                         <td class="align-middle">{{ $item->title }}</td>
                         <td class="align-middle">{{ $item->price }}</td>
                         <td class="align-middle"><a href="edit/{{ $item->id }}"><button
                                     class="btn btn-info">Edit</button></a></td>
                         <td class="align-middle">
                             <form action="delete/{{ $item->id }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-danger" type="submit">Delete</button></a>
                             </form>
                         </td>
                         <!-- table data end -->
                     </tr>
                     <!-- end for loop-->
                 @endforeach

                 <!-- table body end -->
             </tbody>
             <!-- table end -->
         </table>
     </div>
     <!-- for pagination -->
     {{ $data->links() }}
 </div>
 <!-- end section  -->
@endsection
