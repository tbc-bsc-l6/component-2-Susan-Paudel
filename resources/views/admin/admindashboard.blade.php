@extends('adminLayout')
@section('profile')
<div class="container">
  <div class="welcome_Message shadow">
     <h1>Welcome ! {{Auth::guard('admin')->user()->name}}</h1>
  </div>
</div>

@endsection