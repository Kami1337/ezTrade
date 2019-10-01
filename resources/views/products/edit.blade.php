@extends ('layouts.master') 
@section ('content')
<div class="container products">
    <div class="row">
        <div class="col-auto mr-auto">
<h1>Edit product</h1>
        </div>
        <div class="col-auto">
<form method="POST" action="/cms/product/delete/{{$product->id}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <button type="submit" class="btn btn-danger">Delete</button>
</div>
</form>
</div>
<hr>
<form method="POST" action="/cms/product/edit/{{$product->id}}" enctype="multipart/form-data">
    {{csrf_field()}}
    

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="{{$product->title}}" required>
    </div>
    <label for="title">Title</label>
    <select class="custom-select" name="tag">
            @foreach ($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach      
    </select>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" step="any" class="form-control" name="price" value="{{$product->price}}" required>
    </div>

    <div class="form-group">
        <label for="discount">Discount (leave blank if not applicable)</label>
        <input type="number" class="form-control" name="discount" value="{{$product->discount}}">
    </div>

    <div class="form-group">
        <label for="desc">Description</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control" required>{{$product->description}}</textarea>
    </div>

    <div class="input-group control-group increment" >
            <input type="file" name="filename[]" class="form-control"  value="{{$product->filename}}"required>
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
          <h5>Existing product images </h5>
          
          <hr>
          
          <div class="zoom-gallery row">
              
                @foreach($product->images($product->id) as $image)
                
                <div class="col-md-2 col-sm-3">
                  <a href="<?php echo '/images/'. $image?>">
                    <img class="img-fluid" src=<?php echo '/images/'. $image?> alt="image"></a>
                  </div>
                @endforeach
                </div>
                <p class="small">Adding new images overwrites old ones</p>
                <hr>
    <button type="submit" class="btn btn-primary">Edit</button>

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