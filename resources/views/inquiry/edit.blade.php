@extends ('layouts.master') 
@section ('content')
<div class="container products">
        <div class="row">
                <div class="col-auto mr-auto">
<h1>Edit post</h1>
                </div>

<div class="col-auto">
<form method="POST" action="/cms/news/delete/{{$news->id}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
</div>
</div>
<hr>
<form method="POST" action="/cms/news/edit/{{$news->id}}" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group">
        <label for="Name">Title:</label>
        <input type="text" class="form-control" name="title" required placeholder="Something new ?" value={{$news->title}}>
    </div>
    
    <div class="form-group">
        <label for="body">Content:</label>
        <textarea name="body" id="" cols="30" rows="10" class="form-control" required>{{$news->body}}</textarea>
    </div>
    <h5>Images:</h5>
    <div class="input-group control-group increment" >
            <input type="file" name="filename[]" class="form-control">
            <div class="input-group-btn"> 
              <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
            </div>
          </div>
          <div class="clone hide">
            <div class="control-group input-group" style="margin-top:10px">
              <input type="file" name="filename[]" class="form-control">
              <div class="input-group-btn"> 
                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
              </div>
            </div>
          </div>
          <hr>
          <h5>Existing images </h5>
          
          <hr>
          
          <div class="zoom-gallery row">
              
                @foreach($news->images($news->id) as $image)
                
                <div class="col-md-2 col-sm-3">
                  <a href="<?php echo '/images/'. $image?>">
                    <img class="img-fluid" src=<?php echo '/images/'. $image?> alt="image"></a>
                  </div>
                @endforeach
                </div>
                <p class="small">Adding new images overwrites old ones</p>
                <hr>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@stop