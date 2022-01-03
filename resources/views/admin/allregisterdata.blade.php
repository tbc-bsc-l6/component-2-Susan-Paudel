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
        <th scope="col">phone number</th>
        <th scope="col">delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($details as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->password}}</td>
            <td>{{$item->location}}</td>
            <td>{{$item->phonenumber}}</td>
            <td><a href="/custdelete/{{$item->id}}"><button type="submit" class="btn btn-warning">Delete</button></a></td>
          </tr>
            
        @endforeach
     
    </tbody>
  </table>   
</div>
{{$details->links()}}

  @endsection