@extends('layouts.master') 
@section('content')
<hr>
<div class="container newss">
    <div class="row">
        <img class="img-fluid" src=<?php echo '/images/'. $news->coverImage($news->id)?> alt="image">
    </div>
    <hr>
    <h1 class="text-center">{{$news->title}}</h1>

    <hr>
    <p>{{$news->body}}</p>
    <hr>
    <h5 class="text-right small">Posted by <a href="mailto:{{$news->user->email}}">{{$news->user->name}}</a>
        <br> {{$news->created_at->diffForHumans()}}</h5>
    <h5>Post images:</h5>
    <div class="zoom-gallery row">
        @foreach($news->images($news->id) as $image)
        <div class="col-md-2 col-sm-3">
            <a href="<?php echo '/images/'. $image?>">
                <img class="img-fluid" src=<?php echo '/images/'. $image?> alt="image"></a>
        </div>
        @endforeach
    </div>
    <hr>
</div>
@stop