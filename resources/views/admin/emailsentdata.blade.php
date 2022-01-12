 <!--extends adminLayout-->
 @extends('adminLayout')
 <!--section customerdata-->
 @section('customerdata')
 @section('title'){{ 'All Emails' }}
 @endsection
 <!--container that display all the mail information-->
 <div class="container py-5">
     <div class="table-responsive">
         <!--table start-->
         <table class="table table-dark table-striped">
             <!--table header information-->
             <thead>
                 <!--table header-->
                 <tr>
                     <th scope="col">Full Name</th>
                     <th scope="col">Email</th>
                     <th scope="col">Title</th>
                     <th scope="col">Messages</th>
                     <th scope="col">Send Date</th>
                 </tr>
                 <!--end header-->
             </thead>
             <!--table body-->
             <tbody>
                 <!--display collection of data-->
                 @foreach ($data as $item)
                     <tr>
                         <!--display all data-->
                         <td class="align-middle">{{ $item->fullname }}</td>
                         <td class="align-middle">{{ $item->email }}</td>
                         <td class="align-middle">{{ $item->title }}</td>
                         <td class="align-middle">{{ $item->message }}</td>
                         <td class="align-middle">{{ $item->created_at }}</td>
                     </tr>
                     <!--end foreach-->
                 @endforeach
                 <!--end table body-->
             </tbody>
             <!--end table-->
         </table>
     </div>

 </div>
 <!--end container-->
 {{-- {{$details->links()}} --}}
 <!--end section-->
@endsection
