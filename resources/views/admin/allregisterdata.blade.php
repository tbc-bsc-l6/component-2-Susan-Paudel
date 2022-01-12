<!--extends adminLayout-->
@extends('adminLayout')
<!--section customerdata-->
@section('customerdata')
@section('title'){{ 'All Customer' }}
@endsection
<!--container that display all the customer information-->
<div class="container py-5">
    <!--table responsive to make table responsive-->
    <div class="table-responsive">
        <!--table start-->
        <table class="table table-dark table-striped">
            <!--table header-->
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">password</th>
                    <th scope="col">location</th>
                    <th scope="col">phonenumber</th>
                    <th scope="col">Action</th>
                </tr>
                <!--table header end-->
            </thead>

            <!--table body start-->
            <tbody>
                <!--display the collection of data -->
                @foreach ($details as $item)
                    <tr>
                        <!--Display all these data-->
                        <td class="align-middle">{{ $item->name }}</td>
                        <td class="align-middle">{{ $item->email }}</td>
                        <td class="align-middle">{{ $item->password }}</td>
                        <td class="align-middle">{{ $item->location }}</td>
                        <td class="align-middle">{{ $item->phonenumber }}</td>
                        <td class="align-middle">
                            <form action="/custdelete/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <!--end foreach-->
                @endforeach
                <!--end table body-->
            </tbody>
        </table>
    </div>

</div>
<!--display the pagination-->
{{ $details->links() }}
<!--end customerdata section-->
@endsection
