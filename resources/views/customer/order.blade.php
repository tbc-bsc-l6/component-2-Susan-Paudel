<!--extends Layout -->
@extends('Layout')
<!--section content -->
@section('content')
<div class="container py-5">
    <!--display order details header -->
    <div class="pb-5">
        <h1 class="text-center py-3">Order Details</h1>
        <div class="line"></div>
    </div>
   
   <div class="row">
       <div class="col-md-6">
           <!--table -->
           <div class="table-responsive">
            <table class="table table-success table-striped">
              <tbody>
                <tr>
                  <td>Amount</td>
                  <td>&#163;{{$total}}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>&#163;0</td>
                </tr>
                <tr>
                    <td>Delivery</td>
                    <td>&#163;20</td>
                </tr>
                <tr>
                    <th scope="row">Total Amount</th>
                    <th scope="row">&#163;{{$total+20}}</th>
                </tr>
              </tbody>
          </table>
           </div>
         
            <!--end table-->
       </div>
       <div class="col-md-6">
         <!--form for orders -->
          <form action="/storeorder" method="POST" class="shadow p-3">
            <!--create token -->
            @csrf
            <!-- current address-->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Current Address</label>
                <input type="text" class="form-control" name="address" id="exampleFormControlInput1" placeholder="Enter your Current address" required>
                <!--error message -->
                @error('address')
               <span style="color:red;">{{$message}}</span>
                @enderror
              </div>
              <!--Payment Method -->
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Payment Method</label>
                 <select class="form-select" name="paymenttype" aria-label="Default select example" required>
                    <option selected value="CashOnDelivery">Cash On Delivery</option>
                  </select>
                  <!--error message -->
                  @error('paymenttype')
                  <span style="color:red;">{{$message}}</span>
                @enderror
              </div>
              <!--button for oreder now -->
              <button type="submit " class="btn btn-secondary">Order Now</button>
          </form>
          <!--end form -->
       </div>
   </div>
</div>



@endsection
<!--end section -->