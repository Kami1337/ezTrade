<div class="comments">
        <ul class="list-group">
             @foreach ($product->comments as $comment)
                 <li class="list-group-item">
                     <div class="text-left">
                     {{$comment->body}}
                    </div>
                    <div class="text-right">
                     <strong>
                         {{$comment->created_at->diffForHumans()}}
                     </strong>
                    </div>
                 </li>
             @endforeach
         </ul>
         </div>
         <hr>
<div class="card">
        <div class="card-block">
            <form method="POST" action="/product/{{$product->id}}/comment" >
                {{csrf_field()}}
              
                    <textarea name="body" placeholder="leave a comment" class="form-control"></textarea>
                
          
                        <button type="submit" class="btn btn-primary">Add comment</button>
                    
            </form>
        </div>
</div>