@include('own/ImageSlider')
<div class="container py-4">
   
    <div class="d-flex justify-content-between">
        <div><h1>Books</h1></div>
        <div class="mt-1"><button class="btn btn-secondary">Add Product</button></div>
    </div>
    
    <div class="line"></div>
    @include('own/card')
    <h1 class="pt-4">CDs</h1>
    <div class="line"></div>
    @include('own/card')
    <h1 class="pt-4">Games</h1>
    <div class="line"></div>
    @include('own/card')
</div>