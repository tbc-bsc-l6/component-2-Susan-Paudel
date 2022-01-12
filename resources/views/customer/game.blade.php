<!--extends layout -->
@extends('Layout')
<!--section book -->
@section('game')
@section('title'){{ 'Our Game' }}
@endsection
<div class="container py-5">
    <div class="row">
        <!--Book text-->
        <div class="col-12 py-2">
            <h1>Games</h1>
            <hr style="height:5px;background:#232f3e;">
        </div>
    </div>
    <div class="row">
        <!--session message -->
        @if (Session::has('message'))
            <div class="alert alert-info text-center">{{ Session::get('message') }}</div>
        @endif
        <!--if data has more than or equal to one-->
        @if (count($data) >= 1)
            <!--collection of data will display -->
            @foreach ($data as $item)
                <div class="col-md-3 py-2 col-sm-6 col-xs-12">
                    <!--if data has more than or equal to one-->
                    <a href="/details/{{ $item->id }}" style="text-decoration: none;color:gray;">
                        <!--card for diplay product information -->
                        <div class="card shadow">
                            <?php $image = str_replace('public/images\\', '', $item->Image); ?>
                            <img class="img-fluid d-block w-100" src={{ '/images/' . $image }} style="height: 250px;"
                                alt="product image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->mainname }}</h5>
                                <p class="card-text user-select-none">{{ $item->title }}</p>
                                <div class="info d-flex justify-content-between">
                                    <p class="user-select-none">{{ $item->pdp }}</p>
                                    <p class="user-select-none">&#163;{{ $item->price }}</p>
                                </div>
                                <!--form for add to cart -->
                                <form action="/addtocart" method="POST">
                                    <!--create token -->
                                    @csrf
                                    <input type="hidden" value="{{ $item->id }}" name='product_id'>
                                    <button class="btn btn-warning w-100">Add To Cart<i
                                            class="fa fa-shopping-cart ms-1 mt-1" aria-hidden="true"></i></button>
                                </form>
                                <!--end form -->
                            </div>
                        </div>
                    </a>
                </div>
                <!--end foreach -->
            @endforeach
            <!--else-->
        @else
            <!--display text -->
            <h1>No Related Product Found... </h1>
        @endif
    </div>
    <!--display pagination-->
    {{ $data->links() }}
</div>
<!--end section -->
@endsection
