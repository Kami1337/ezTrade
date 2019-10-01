<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index()
    {   
        $news = News::all();
        return view ('news.index', compact('news'));
        return session('message');

    }
    public function show(News $news)
    {
        return view('news.single', compact('news'));
    }
    public function create()
    {
        return view('news.create', compact('news'));
    }

    public function editView(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function validateReq(Request $request)
    {
        $this->validate($request, [
            'title' =>'required|min:5',
            'body' =>'required|min:5',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);
        
    }
    public function delete(Request $request, $id)
    {
        $news = News::find($id);   
        $news->destroy($id);
        return redirect()->route('cms')->with('error', 'Post removed');
    }
    public function userId()
    {
        return auth()->user()->id;
    }

    public function edit(Request $request, $id)
    {  
        $news = News::find($id);
        $this->validateReq($request);
        $news->title = $request->input('title');
        $news->body = $request->input('body');
        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data[] = $name;  
                $news->filename=json_encode($data);  
            }
        }
        $news->user_id = $this->userId();
        $news->save();        
        return redirect()->route('cms')->with('success', 'Post edited');
    }
    
    public function store(Request $request)
    {
        $this->validateReq($request);

        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data[] = $name;  
            }
        }
               
        $news= new News(request(['title','body']));  
        $news->user_id=auth()->id();
        $news->filename=json_encode($data); 
        $news->save();
        return redirect()->route('cms')->with('success', 'News added');
    }
    
    public function about()
    {
        return view('news.about');
    }
}
