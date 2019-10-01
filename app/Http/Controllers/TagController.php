<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        $products = $tag->products;
        return view('products.index', compact('products'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required'
        ]);
        $tag = new Tag;
        $tag->filename= $request->filename;
        $tag->name = $request->name;
        $tag->save();
        return back()->with('success', 'Category added');
    }
    public function show(Tag $tag)
    {
        return view('tags.create', compact('tag'));
    }
    public function editView(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }
    public function delete(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->destroy($id);
        return redirect()->route('store')->with('danger', 'Tag deleted');
    }

    public function edit(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->name = $request->input('name');
        $tag->filename = $request->input('filename');  
        $tag->save();
        return redirect()->route('store')->with('success', 'Tag edited');
    }
}
