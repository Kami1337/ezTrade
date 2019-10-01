@extends('layouts.master') @section('content') @include('layouts.carousel')
<div class="container products">
    <hr>
    <div class="row">
        <body onload="InitDemo();">
            <canvas id="game-surface" width="1000" height="600">
                Your browser does not support HTML5
            </canvas>
            <br>
            <img id="logo3D" src="{{ URL::asset('/images/logo3D.png')}}" width="0" height="0">
            <script src={{ URL::asset( '/js/gl-matrix.js')}}></script>
            <script src={{ URL::asset( '/js/cube.js')}}></script>
    </div>
</div>
@stop