<div class="row">
    <div class="col-auto col-md-3 mr-auto">
        <h3>Products</h3>
    </div>
    <hr>
    <div class="col-auto">
        <a href="/cms/product/new">
            <button type="button" class="btn btn-success">New product</button>
        </a>
    </div>
</div>
<hr>
@foreach($products as $product)
<div class="row">
    <div class="col-auto col-md-3 mr-auto">
        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#P{{$product->id}}">{{$product->title}}</button>
    </div>
    <div class="col-auto">

        {{$product->created_at->diffForHumans()}}

    </div>
</div>
<hr>
<div class="modal fade" id="P{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$product->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-4 box-shadow">
                    <a href="/product/{{$product->id}}">
                        <img class="card-img-top" src=<?php echo '/images/'. $product->coverImage($product->id)?> alt="image">
                    </a>
                    <div class="card-body">
                        <h3 class="card-text text-center">
                            <span class="badge badge-pill badge-dark">{{$product->price}}£</span>
                        </h3>
                        <hr>
                        <div class="text-center">
                            @foreach($product->tags as $c)
                            <div class="row">
                                <p class="col-md-6">Category:</p> <p class="col-md-6">{{$c->name}}</p>
                            </div>
                            @endforeach
                            <p class="small"> {{$product->description}} </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <form method="POST" action="/cms/product/archive/{{$product->id}}">
                    <button type="submit button" class="btn btn-warning">Archive</button>
                    {{csrf_field()}}
                </form>
                <form method="POST" action="/cms/product/delete/{{$product->id}}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="/cms/product/edit/{{$product->id}}">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    {{csrf_field()}}
                    <button type="button submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach