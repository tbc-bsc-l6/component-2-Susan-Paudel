<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Product Details</title>
  <style>
    body{
      background: rgb(255, 251, 251);
      margin:0px auto;
    }
   .insert{
     margin: 0px auto;
     align-content:center;
   }
    table{
      margin:0px auto;
    }
    td{
      justify-content: center;
      padding:20px;
    }
    .insert{
      display: flex;
      
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
  </style>
</head>
<body>
  <div class="container py-5">
      <div class="insert">
        <h1>Order Products</h1>
        <a href="/downlaodpdf"><button type="submit">Download PDF</button></a>
      </div>
   
  <table border="1" class="table table-dark">
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
      <tbody>
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
       
      </tbody>
    </table>  
  </div>

</body>
</html>
   