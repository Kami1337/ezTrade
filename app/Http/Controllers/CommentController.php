<?php

namespace App\Http\Controllers;

use App\Product;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {   //require login to access controller
        $this->middleware('auth')->except(['index']);
    }
    public function store(Product $product)
    {
        $this->validate(request(), ['body' =>'required|min:10']);
        $product->addComment(request('body','user_id'));
        
        return back();
    }
}

