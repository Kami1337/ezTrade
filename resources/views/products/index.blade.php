@extends('layouts.master')
@section('content')
<div class="container products">
        
        <div class="row">
            <div class="col-md-12">
                    <form method="GET" action="/search/" class="form-inline">
                        <input class="form-control col-md-10" type="text" placeholder="Search by name, description, price or filter by categories" aria-label="Search" name="search">
                   
        <div class="btn-group ml-auto">
                <button type="button submit" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                        @include('layouts.sidebar')
                </div>
              </div>
            </form>
        </div>
    </div>       
            <hr>
            @if(!empty($numresults))
            <h5> There is {{$numresults}} results for your entered search</h5>
            <hr>
            @endif

      
@include('products.listproduct')
</div>
@stop
