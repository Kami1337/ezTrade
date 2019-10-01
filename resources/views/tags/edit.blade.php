@extends ('layouts.master') 
@section ('content')
<div class="container products">
    <div class="row">
        <div class="col-auto mr-auto">
<h1>Edit category</h1>
        </div>
        <div class="col-auto">
<form method="POST" action="/cms/tag/delete/{{$tag->id}}" enctype="multipart/form-data">
  {{csrf_field()}}
  <button type="submit" class="btn btn-danger">Delete</button>
</div>
</div>
  <form method="POST" action="/cms/tag/edit/{{$tag->id}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
      <label for="title">Name</label>
      <input type="text" class="form-control" name="name" required value="{{$tag->name}}">
    </div>
    <label for="images">Category image (Optional) </label>
    <div class="input-group control-group increment">
      <input type="file" name="filename" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

<hr>
<h5>Existing category image</h5>

<hr>

<div class="zoom-gallery row">
        <div class="col-md-2 col-sm-3">
        <a href="<?php echo '/images/'. $tag->filename?>">
          <img class="img-fluid" src=<?php echo '/images/'. $tag->filename?> alt="image"></a>
        </div>
      </div>
      <p class="small">Adding new image overwrites old one</p>
      <hr>
    </div>
@stop