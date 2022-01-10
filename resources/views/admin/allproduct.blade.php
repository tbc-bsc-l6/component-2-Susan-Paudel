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
  @if(Session::has('success'))
  <div class="alert alert-success" role="alert">
     {{Session::get('success')}}
  </div>
  @endif
  @if(Session::has('updated'))
  <div class="alert alert-success" role="alert">
     {{Session::get('updated')}}
  </div>
  @endif
<div class="table-responsive">
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
        <th scope="col" colspan="2">Action</th>
       
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td class="align-middle"><img src="{{asset('/images/'.$item->Image)}}" style="height: 50px;width:50px;"></td>
            <td class="align-middle">{{$item->producttype}}</td>
            <td class="align-middle">{{$item->mainname}}</td>
            <td class="align-middle">{{$item->pdp}}</td>
            <td class="align-middle">{{$item->firstname}}</td>
            <td class="align-middle">{{$item->title}}</td>
            <td class="align-middle">{{$item->price}}</td>
            <td class="align-middle"><a href="edit/{{$item->id}}"><button class="btn btn-info">Edit</button></a></td>
            <td class="align-middle">
              <form action="delete/{{$item->id}}" method="POST">
               @csrf
               @method('DELETE')
               <button class="btn btn-danger" type="submit">Delete</button></a>
              </form>
            </td>
          </tr>
            
        @endforeach
     
    </tbody>
  </table>
</div>
  
  {{ $data->links() }}
</div>
  @endsection 