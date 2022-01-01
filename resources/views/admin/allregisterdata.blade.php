@extends('adminLayout')
@section('customerdata')
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">password</th>
        <th scope="col">location</th>
        <th scope="col">phone number</th>
        <th scope="col">edit</th>
        <th scope="col">delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->password}}</td>
            <td>{{$item->location}}</td>
            <td>{{$item->phonenumber}}</td>
            <td><a href="edit/{{$item->id}}">edit</a></td>
            <td><a href="delete/{{$item->id}}">delete</a></td>
          </tr>
            
        @endforeach
     
    </tbody>
  </table>   
  @endsection