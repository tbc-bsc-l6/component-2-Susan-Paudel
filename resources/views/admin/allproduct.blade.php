@extends('adminLayout')
@section('allproduct')
<div class="container py-5">
  <div class="insert_tab d-flex justify-content-between bg-light p-3">
    <div class="insert">
      <h1>Insert data</h1>
    </div>
    <div class="button">
        <a href="/insertform"><button type="button" class="btn btn-outline-dark mt-2" >Add Product</button></a>
      
    </div>
  </div>
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Image</th>
        <th scope="col">producttype</th>
        <th scope="col">mainname</th>
        <th scope="col">PagesDurationPEGI</th>
        <th scope="col">firstname</th>
        <th scope="col">title</th>
        <th scope="col">price</th>
        <th scope="col">edit</th>
        <th scope="col">delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td><img src="{{asset('/images/'.$item->Image)}}" style="height: 50px;width:50px;"></td>
            <td>{{$item->producttype}}</td>
            <td>{{$item->mainname}}</td>
            <td>{{$item->pdp}}</td>
            <td>{{$item->firstname}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->price}}</td>
            <td><a href="edit/{{$item->id}}"><button class="btn btn-info">Edit</button></a></td>
            <td><a href="delete/{{$item->id}}"><button class="btn btn-danger">Delete</button></a></td>
          </tr>
            
        @endforeach
     
    </tbody>
  </table>  
</div>
  @endsection 