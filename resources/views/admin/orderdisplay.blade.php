@extends('adminLayout')
@section('customerdata')
<div class="container py-5">
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">password</th>
        <th scope="col">location</th>
        <th scope="col">phonenumber</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($details as $item)
        <tr>
            <td class="align-middle">{{$item->name}}</td>
            <td class="align-middle">{{$item->email}}</td>
            <td class="align-middle">{{$item->password}}</td>
            <td class="align-middle">{{$item->location}}</td>
            <td class="align-middle">{{$item->phonenumber}}</td>
          </tr>
            
        @endforeach
     
    </tbody>
  </table>   
</div>
{{$details->links()}}

  @endsection