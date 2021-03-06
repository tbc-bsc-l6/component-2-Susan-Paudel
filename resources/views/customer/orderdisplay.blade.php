<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--link bootstrap css-->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Product Details</title>
    <!--inline css-->
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

    </style>
    <!--css end -->
</head>
<!--body -->

<body>
    <!--header content -->
    <div class="container py-5">
        <div class="insert d-flex justify-content-between">
            <h1>Order Products</h1>
            <a href="/downlaodpdf"><button type="submit" class="btn btn-secondary">Download PDF</button></a>
        </div>
        <!--end header content -->
        <!-- table-->
        <div class="table-responsive">
            <table border="1" class="table table-dark" id="customers">
                <!--table head -->
                <thead>
                    <tr>
                        <th scope="col">producttype</th>
                        <th scope="col">mainname</th>
                        <th scope="col">PagesDurationPEGI</th>
                        <th scope="col">firstname</th>
                        <th scope="col">title</th>
                        <th scope="col">price</th>
                    </tr>
                </thead>
                <!--table head end -->
                <tbody>
                    <!-- display collection of data-->
                    @foreach ($order as $item)
                        <tr>
                            <td>{{ $item->producttype }}</td>
                            <td>{{ $item->mainname }}</td>
                            <td>{{ $item->pdp }}</td>
                            <td>{{ $item->firstname }}</td>
                            <td>{{ $item->title }}</td>
                            <td> &#163; {{ $item->price }}</td>
                        </tr>

                    @endforeach
                    <!--end foreach -->
                </tbody>
            </table>
        </div>
        <!--end table -->
    </div>

</body>

<!--script that link boostrap js file-->
<script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--end body -->

</html>
