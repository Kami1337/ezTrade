@extends('layouts.master') 
@section('content')
<div class="container products">
        <hr>
    <div class="row">
        <h4 class="col-12">News:</h4>
        <hr> @foreach($news as $post)
        <div class="col-12">
            <div class="postd mb-4 box-shadow">
                <a href="/news/{{$post->id}}">
                    <img class="postd-img-top" src=<?php echo '/images/'. $post->coverImage($post->id)?> alt="image">
                </a>
                <div class="postd-body">
                    <hr>
                    <h4 class="postd-text text-center">{{$post->title}}</h4>
                    <hr>
                    <p>{{str_limit($post->body, 200)}}
                        <br>
                        <a href="/news/{{$post->id}}">Continue reading</a>
                    </p>
                    <h5 class="text-right small">Posted by
                        <a href="mailto:{{$post->user->email}}">{{$post->user->name}}</a>
                        <br> {{$post->created_at->diffForHumans()}}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @stop