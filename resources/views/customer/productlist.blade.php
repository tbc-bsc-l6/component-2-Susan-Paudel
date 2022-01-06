@extends('Layout')
@section('productlist')
<div class="container py-5">
    <div class="card p-5 text-center shadow" style="width:400px;margin:0px auto;">
        <h1>Thanks For Your Order</h1>
        <i class="fa fa-shopping-cart fa-5x py-5" aria-hidden="true"></i>
        <a href="{{route('productlist')}}" target="_blank"><button type="submit" class="btn btn-secondary" >Check Order List</button></a>
    </div>
</div>
@endsection
