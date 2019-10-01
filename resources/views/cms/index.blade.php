@extends ('layouts.master') 
@section ('content')
<div class="container products">
<hr>
<button class="btn btn-info btn-block full" id="categories">
    <i class="fas fa-industry"></i> Categories</button>
<hr>
<div id="categoriesdiv" class="cms">
    @include('cms.categories')
</div>

<button class="btn btn-info btn-block full" id="products">
    <i class="fas fa-box"></i> Products</button>
<hr>
<div id="productsdiv" class="cms">
    @include('cms.products')
</div>

<button class="btn btn-info btn-block full" id="arcproducts">
    <i class="fas fa-box"></i> Archived products</button>
<hr>
<div id="arcproductsdiv" class="cms">
    @include('cms.archivedProducts')
</div>

<button class="btn btn-info btn-block full" id="users">
    <i class="fas fa-users"></i> Users</button>
<hr>
<div id="usersdiv" class="cms">
    @include('cms.users')
</div>


<button class="btn btn-info btn-block full" id="orders">
    <i class="fas fa-sticky-note"></i> Orders</button>
<hr>
<div id="ordersdiv" class="cms">
    @include('cms.orders')
</div>

<button class="btn btn-info btn-block full" id="incorders">
    <i class="fas fa-sticky-note"></i> Pending orders</button>
<hr>
<div id="incordersdiv" class="cms">
    @include('cms.incorders')
</div>

<button class="btn btn-info btn-block full" id="post"><i class="fas fa-newspaper"></i> News</button>
<hr>
<div id="postdiv" class="cms">
    @include('cms.news')
</div>
<button class="btn btn-info btn-block full" id="inquiry">
    <i class="far fa-question-circle"></i> Inquiries</button>
<hr>
<div id="inquirydiv" class="cms">
    @include('cms.incompleteInq') 
    @include('cms.completedInq')
</div>

</div>
@stop