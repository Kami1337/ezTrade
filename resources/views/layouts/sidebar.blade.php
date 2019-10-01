<a class="dropdown-item" href="/store">All products</a>
<div class="dropdown-divider"></div>
@foreach ($tags as $tag)  
<a class="dropdown-item" href="/product/tag/{{$tag}}">{{$tag}}</a>
 @endforeach
