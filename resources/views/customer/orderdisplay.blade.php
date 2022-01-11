<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Product Details</title>
  <!--inline css -->
  <style>
    body{
      background: rgb(255, 251, 251);
      margin:0px auto;
    }
   .insert{
     margin: 0px auto;
     align-content:center;
   }
    td{
      justify-content: center;
      padding:20px;
    }
    .insert{
      display: flex;
      flex-flow: wrap;
      justify-content: space-around;
    }
    .insert a{
      margin-top: 15px;
     
    }
    .insert a button{
      background: skyblue;
      color:black;
      padding:10px;
      border:0px;
      border-radius:10px;
      cursor: pointer;
    }
  #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 60%;
  margin:0px auto;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

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
      <div class="insert">
        <h1>Order Products</h1>
        <a href="/downlaodpdf"><button type="submit">Download PDF</button></a>
      </div>
   <!--end header content -->
   <!-- table-->
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
              <td>{{$item->producttype}}</td>
              <td>{{$item->mainname}}</td>
              <td>{{$item->pdp}}</td>
              <td>{{$item->firstname}}</td>
              <td>{{$item->title}}</td>
              <td> &#163; {{$item->price}}</td>
            </tr>
              
          @endforeach
       <!--end foreach -->
      </tbody>
    </table> 
    <!--end table --> 
  </div>

</body>
<!--end body -->
</html>