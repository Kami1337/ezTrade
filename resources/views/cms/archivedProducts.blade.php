<div class="row">
    <div class="col-auto col-md-3 mr-auto">
        <h3>Archived products</h3>
    </div>
    <hr>
</div>
<hr> @foreach($archivedProducts as $arcproduct)
<div class="row">
    <div class="col-auto col-md-3 mr-auto">
        <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#AP{{$arcproduct->id}}"><i class="fas fa-car"></i> {{$arcproduct->name}}</button>
    </div>
    <div class="col-auto">

        {{$arcproduct->created_at->diffForHumans()}}

    </div>
</div>
<hr>
<div class="modal fade" id="AP{{$arcproduct->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$arcproduct->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-4 box-shadow">
                    <a href="/car/{{$arcproduct->id}}">
                        <img class="card-img-top" src=<?php echo '/images/'. $arcproduct->coverImage($arcproduct->id)?> alt="image">
                    </a>
                    <div class="card-body">
                        <h3 class="card-text text-center">
                            <span class="badge badge-pill badge-dark">{{$arcproduct->price}}£</span>
                        </h3>
                        <hr>
                        <div class="text-center">
                                @foreach($arcproduct->tags as $c)
                                <div class="row">
                                    <p class="col-md-6">Category:</p> <p class="col-md-6">{{$c->name}}</p>
                                </div>
                                @endforeach
                                <p class="small"> {{$arcproduct->description}} </p>
                            </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                    <form method="POST" action="/cms/product/unarchive/{{$arcproduct->id}}">
                        <button type="submit button" class="btn btn-info">Restore</button>
                        {{csrf_field()}}
                        </form>
                <form method="POST" action="/cms/product/delete/{{$arcproduct->id}}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="/cms/product/edit/{{$arcproduct->id}}">
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