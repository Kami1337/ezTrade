<?php

namespace App\Http\Controllers;

use App\Product;
use App\Tag;
use App\Order;

use Illuminate\Http\Request;

class ProductController extends Controller{


    public function __construct()
    {   //require login to access controller
        $this->middleware('auth')->except(['index','show','search']);
    }
    
    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::search($search)->get();
        $numresults = $products->count();
        return view ('products.index', compact('products','numresults'));
    }

    public function index()
    {   
        $products = Product::all();
        //->filter(request(['month','year']))
        //->get();

        return view ('products.index', compact('products'));
        return session('message');

    }
    public function show(Product $product)
    {
        return view('products.single', compact('product'));
    }
    public function create()
    {
        return view('products.create', compact('product'));
    }

    public function editView(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function validateReq(Request $request)
    {
        $this->validate($request, [
            'title' =>'required|min:5',
            'description' =>'required|min:5',
            'price' =>'required',
            'filename' =>'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);
        
    }
    public function delete(Request $request, $id)
    {
        $product = Product::find($id);   
        // Detach tag
        $tag = $request->input('tag');
        $product->tags()->detach($tag);
        // Delete the record
        $product->destroy($id);
        return redirect()->route('cms')->with('error', 'Product removed');
    }

    public function edit(Request $request, $id)
    {
        
        $product = Product::find($id);
        $this->validateReq($request);
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->description = $request->input('description');
        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data[] = $name;  
            }
        }
        $product->filename=json_encode($data);  
        $product->user_id = $this->userId();
        $product->save();
        //grab $tag from request and attach it to product_tag 
        $tag = $request->input('tag');
        $product->tags()->toggle($tag);
        return back()->with('success', 'Product edited');
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
        
        
        $product= new Product(request(['title','description','price','discount']));  
        $product->filename=json_encode($data); 
        $product->user_id=auth()->id();
      
        $product->save();
        //grab $tag from request and attach it to product_tag 
        $tag = $request->input('tag');
        $product->tags()->attach($tag);
        return back()->with('success', 'Product added');
    }

    public function addToCart(Request $request, $id)
    {
        //compare id with request $id and get all values as array
        $product= Product::where('id',$id)->get();
        //access first array value and translate properties to \cart
        $title=$product[0]->title;
        $description=$product[0]->description;
        $price=$product[0]->price;
        $filename=$product[0]->filename;
        $userId = auth()->user()->id; 
        \Cart::session($userId)->add($id, $title, $price, 1, array('filename'=>$filename,'description'=>$description));
        return back()->with('success', 'Product added to cart');
    }

    public function cart()
    {
        $userId = $this->userId();
        $cartCollection = \Cart::session($userId)->getContent();
        $cartTotalQuantity = \Cart::session($userId)->getTotalQuantity();
        $total = \Cart::session($userId)->getTotal();
        return view ('cart.index', compact('cartCollection','cartTotalQuantity','total'));
    }

    public function removeFromCart(Request $request, $id)
    {
        $userId = $this->userId();
        \Cart::session($userId)->remove($id);
        return back()->with('success', 'Item removed');
    }

    public function plus(Request $request, $id)
    {
        $userId = $this->userId();
        \Cart::session($userId)->update($id, array(
        'quantity' => 1,
      ));
      return back()->with('success', 'Item added');
    }

    public function minus(Request $request, $id)
    {
        $userId = $this->userId();
        \Cart::session($userId)->update($id, array(
        'quantity' => -1,
      ));
      return back()->with('success', 'Item removed');
    }
    public function userId()
    {
        return auth()->user()->id;
    }
    public function cartTotals()
    {
        $userId = $this->userId();
        $cartTotalQuantity = \Cart::session($userId)->getTotalQuantity();
        $total = \Cart::session($userId)->getTotal();
        return (array('totalQuantity'=>$cartTotalQuantity,'total'=>$total));
    }
    public function cartContent()
    {
        $userId = $this->userId();
        return \Cart::session($userId)->getContent();
    }
    public function checkout()
    {
        $cartContent=$this->cartTotals();
        $cart=$this->cartContent();
        return view ('cart.checkout',compact('cartContent', 'cart'));
    }
    public function newOrder(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zip' => 'required'
        ]);
        $order= new Order(request(['first_name','last_name','address','adress2','country','state','zip']));  
        $order->cart_data = json_encode($this->cartContent());
        $userId = $this->userId();
        $order->total = \Cart::session($userId)->getTotal();
        $order->save();
        \Cart::session($userId)->clear();
        return redirect()->route('store')->with('success', 'Your order has been received, we will email you the details');
    }
}
   
