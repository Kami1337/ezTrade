@extends ('layouts.master') @section ('content')
<div class="container products">
  <h1>Create new category</h1>
  <form method="POST" action="/cms/tag/new" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group">
      <label for="title">Name</label>
      <input type="text" class="form-control" name="name" required>
    </div>
    <label for="images">Category image (Optional) </label>
    <div class="input-group control-group increment">
      <input type="file" name="filename" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@stop