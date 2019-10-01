@extends('layouts.master')
@section('content')
<img class="img-fluid" src=<?php echo '/images/'. $product->coverImage($product->id)?> alt="image">

<div class="container products">
    <div class="row">
    <div class="col-auto mr-auto">
        <h1>{{$product->title}}</h1>
    </div>
    <div class="col-auto">    
            <form method="POST" action="/product/{{$product->id}}/add" >
                {{csrf_field()}}
                <input type="hidden" value={{$product->id}} name="id">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
            
    </div>
</div>
<div class="row">
        <div class="col-auto ml-auto">
            @if($product->discount==0)
            <span class="badge badge-pill badge-success">
                <h3>£{{$product->price}}</h3>
            </span>
            @else
            <span class="badge badge-pill badge-danger">
                <p class="small">Was</p>
                <h4 class="discount">£{{$product->price}}</h4>
            </span>

            <span class="badge badge-pill badge-success">
                <p class="small">Now only</p>
                <h3>£{{$product->discount}}</h3>
            </span>
            @endif
        </div>
        
    </div>
    <hr>
    {{$product->description}}
<hr>
<h4>Product images</h4>
<hr>
<div class="zoom-gallery row">
        @foreach($product->images($product->id) as $image)
        <div class="col-md-2 col-sm-3">
          <a href="<?php echo '/images/'. $image?>">
            <img class="img-fluid" src=<?php echo '/images/'. $image?> alt="image"></a>
          </div>
        @endforeach
        </div>
        <hr>


<hr>
@if(count($product->tags))
    @foreach($product->tags as $tag)
        <a href="/product/tag/{{$tag->name}}"><h4>Related products</h4></a>
    @endforeach
@endif
<hr>

<h5>User feedback</h5><hr>
@include('products.comments')
</div>
@stop
