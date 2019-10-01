@extends ('layouts.master') 
@section ('content')
<div class="container products">
<h1>Create a new post</h1>
<hr>
<form method="POST" action="/cms/news/new" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group">
        <label for="Name">Title:</label>
        <input type="text" class="form-control" name="title" required placeholder="Something new ?" value="{{ old('title') }}">
    </div>
    
    <div class="form-group">
        <label for="desc">Content:</label>
        <textarea name="body" id="" cols="30" rows="10" class="form-control" required>{{ old('body') }}</textarea>
    </div>
    <h5>Images:</h5>
    <div class="input-group control-group increment" >
            <input type="file" name="filename[]" class="form-control" required>
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
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@stop