@extends('Layout')
@section('content')
    <h1>Email has been sedn to your email address</h1>
    <form action="{{route('verification.send')}}" method="POST">
        @csrf
        <button class="btn btn-secondary">Resend varification</button>
    </form>
   
@endsection