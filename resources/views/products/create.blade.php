@extends ('layouts.master') 
@section ('content')
<div class="container products">
<h1>Create new product</h1>
<form method="POST" action="/cms/product/new" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" required>
    </div>

    <select class="custom-select" name="tag">
            <option selected>Select category</option>
            @foreach ($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach    
    </select>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" step="any" class="form-control" name="price" required>
    </div>

    <div class="form-group">
        <label for="discount">Discount (leave blank if not applicable)</label>
        <input type="number" class="form-control" name="discount">
    </div>

    <div class="form-group">
        <label for="desc">Description</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control" required></textarea>
    </div>

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

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>


<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>
@stop