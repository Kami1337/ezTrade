@extends('layouts.master')
@section('content')
<div class="container products">
    <h4>You have {{$cartTotalQuantity}} items in your cart </h4>
        @foreach($cartCollection as $item)
        <hr>
        <div class="row">
            <div class="col-md-4">
                <a href="/products/{{$item->id}}">
                    <img class="card-img-top" src="/images/{{json_decode($item->attributes->filename)[0]}}" alt="image">
                </a>
            </div>
            <div class="col-md-3">
                <h4>{{$item->name}}</h4>
                <h4>{{json_decode($item->attributes->description)}}</h4>
            </div>
            <div class="row col-md-3">
                <a href="/cart/minus/{{$item->id}}"><i class="fas fa-minus-circle"></i> </a>
                <br><h5> <span class="badge badge-secondary badge-pill">{{$item->quantity}}</span> </h5><br>
                <a href="/cart/plus/{{$item->id}}"><i class="fas fa-plus-circle"></i></a>
            </div>
            <div class="col-md-2">
                <h5>{{$item->price}} £</h5>
                <a href="/cart/remove/{{$item->id}}"><i class="fas fa-trash-alt"></i> </a>
            </div>
        </div>
            @endforeach
            <hr>
            <h3 class="text-right">{{$total}} £<h3>
                    @if(count($cartCollection))
                    <a href="/cart/checkout">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                    </a>
</div>

@endif
@stop