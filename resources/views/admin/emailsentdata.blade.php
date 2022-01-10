@extends('adminLayout')
@section('customerdata')
<div class="container py-5">
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">Full Name</th>
        <th scope="col">Email</th>
        <th scope="col">Title</th>
        <th scope="col">Messages</th>
        <th scope="col">Send Date</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td class="align-middle">{{$item->fullname}}</td>
            <td class="align-middle">{{$item->email}}</td>
            <td class="align-middle">{{$item->title}}</td>
            <td class="align-middle">{{$item->message}}</td>
            <td class="align-middle">{{$item->created_at}}</td>
          </tr>
            
        @endforeach
     
    </tbody>
  </table>   
</div>
{{-- {{$details->links()}} --}}

  @endsection