<?php

namespace App\Http\Controllers;
use App\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {   
        $inquiry = Inquiry::all();
        return view ('inquiry.index', compact('inquiry'));
        return session('message');

    }
    public function show(Inquiry $inquiry)
    {
        return view('inquiry.single', compact('inquiry'));
    }
    public function create()
    {
        return view('inquiry.create', compact('inquiry'));
    }

    public function validateReq(Request $request)
    {
        $this->validate($request, [
            'title' =>'required|min:5',
            'body' =>'required|min:5',
            'email' =>'required|email|min:5',
            'phone' =>'required|min:5'
        ]);
        
    }
    public function delete(Request $request, $id)
    {
        $inquiry = Inquiry::find($id);   
        $inquiry->destroy($id);
        return redirect()->route('cms')->with('error', 'Inquiry removed');
    }
    public function userId()
    {
        return auth()->user()->id;
    }
    
    public function store(Request $request)
    {
        $this->validateReq($request);          
        $inquiry= new Inquiry(request(['title','body','name','email','phone']));  
        //$inquiry->user_id=auth()->id();
        $inquiry->save();
        return redirect()->route('home')->with('success', 'Inquiry added');
    }
    public function complete(Request $request, $id)
    {
        $inquiry = Inquiry::find($id);
        //user_id is linked to user that closes inquiry, not the poster
        $inquiry->user_id=auth()->user()->id;
        $inquiry->save();
        return back()->with('success', 'Inquiry completed');
    }
}

