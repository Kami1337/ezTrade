<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">      
          <div class="carousel-item active">
              
            <img class="first-slide banner" src="/images/banners/<?php echo rand(1,5);?>.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Welcome to eZtrade</h1>
                <p><a class="btn btn-lg btn-primary" href="/showroom" role="button">Check our amazing products</a></p>
              </div>
            </div>
            
          </div>
          @foreach($products as $product)
           <div class="carousel-item">       
            <img class="{{$product->id}}-slide banner" src="<?php echo '/images/'. $product->coverImage($product->id)?>" alt="{{$product->id}} slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>{{$product->title}}</h1>
                <p>£{{str_limit($product->description, 200)}}</p>
                <p><a class="btn btn-lg btn-primary" href="/product/{{$product->id}}" role="button">Learn more</a></p>
              </div>
            </div>   
          </div>
          @endforeach
        </div> 
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>