<!--extends adminLayout-->
@extends('adminLayout')
<!--section customerdata-->
@section('customerdata')
@section('title'){{ 'Order Display' }}
@endsection
<!--Container that display all the oreder data-->
<div class="container py-5">
    <!-- bootstrap that make table responsive -->
    <div class="table-responsive">
        <!--table start -->
        <table class="table table-dark table-striped">
            <!-- table header-->
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">password</th>
                    <th scope="col">location</th>
                    <th scope="col">phonenumber</th>
                    <th scope="col">Action</th>
                </tr>
                <!-- end table header-->
            </thead>
            <!-- table body -->
            <tbody>
                <!--for each used to display collection of data -->
                @foreach ($details as $item)
                    <!--display table data -->
                    <tr>
                        <td class="align-middle">{{ $item->name }}</td>
                        <td class="align-middle">{{ $item->email }}</td>
                        <td class="align-middle">{{ $item->password }}</td>
                        <td class="align-middle">{{ $item->location }}</td>
                        <td class="align-middle">{{ $item->phonenumber }}</td>
                    </tr>
                    <!--end table data -->
                    <!-- end foreach-->
                @endforeach
                <!--end table body -->
            </tbody>
            <!--end table -->
        </table>
    </div>

</div>
<!--display pagination links -->
{{ $details->links() }}
<!--end seaction -->
@endsection
