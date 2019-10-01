<div class="row">
    <div class="col-auto col-md-3 mr-auto">
        <h3>Categories</h3>
    </div>
    <hr>
    <div class="col-auto">
        <a href="/cms/tag/new">
            <button type="button" class="btn btn-success">New category</button>
        </a>
    </div>
</div>
<hr> @foreach($categories as $category)
<div class="row">
    <div class="col-auto col-md-3 mr-auto">
        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#CAT{{$category->id}}">{{$category->name}}</button>
    </div>
    <div class="col-auto">

        <span class="badge badge-pill badge-success"><h6>{{$category->products()->count()}}</h6></span>
    </div>
</div>
<div class="modal fade" id="CAT{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$category->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                        <h3 class="card-text text-center">
                            <span class="badge badge-pill badge-dark">Products in this category {{$category->products()->count()}}</span><br><hr>
                            @foreach($category->products as $product)             
                                {{$product->title}}
                                <a href="product/{{$product->id}}">
                                    <img class="card-img-top" src="<?php echo '/images/'.$product->coverImage($product->id)?>"alt="Product">
                                </a>
                                <hr>
                                @endforeach
                        </h3>
                        <hr>
                        <div class="text-center">

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <form method="POST" action="/cms/tag/delete/{{$category->id}}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="/cms/tag/edit/{{$category->name}}">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    {{csrf_field()}}
                    <button type="button submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<hr>
@endforeach