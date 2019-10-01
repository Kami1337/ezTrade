<div class="row">
    @foreach($products as $product)
    <div class="col-xs-12 col-md-4 col-xl-3 col-sm-4 col-lg-3">
        <div class="card mb-4 box-shadow">
            <a href="/product/{{$product->id}}">
                <img class="card-img-top" src=<?php echo '/images/'. $product->coverImage($product->id)?> alt="image">
            </a>
            <div class="card-body">
                <h5 class="card-text text-center"> {{$product->price}} £</h5>         
                <hr>
                <h4 class="card-text text-center">{{$product->title}}</h4>      
                <div class="text-center">
                        <form method="POST" action="/product/{{$product->id}}/add" >
                            {{csrf_field()}}
                            <input type="hidden" value={{$product->id}} name="id">
                            <button type="submit" class="btn btn-primary text-center">Add to Cart</button>
                        </form>
        
                </div>  
            </div>
        </div>
    </div>



@endforeach