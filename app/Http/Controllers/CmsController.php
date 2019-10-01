<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Tag;
use App\User;
use App\Order;
use App\Inquiry;
use App\News;

class CmsController extends Controller
{
    public function __construct()
    {   //require login to access controller
        $this->middleware('auth');
    }
    public function index()
    {       
        $products = Product::all()->where('status',!'1')->sortByDesc('created_at');
        
        $archivedProducts = Product::all()->where('status','1')->sortByDesc('updated_at');

        $comInq = Inquiry::all()->where('user_id',!NULL)->sortByDesc('updated_at');
        $comInqTotal = $comInq->count(); 
        
        $incInq = Inquiry::all()->where('user_id',NULL)->sortByDesc('updated_at');
        $incInqTotal = $incInq->count();
        
        $categories = Tag::all();
        $users = User::all();
        $news = News::all();
        
        $orders = Order::all()->where('completed',NULL)->sortBy('created_at');
        $orderTotal = $orders->count();
        
        $completedOrders = Order::all()->where('completed','1')->sortByDesc('updated_at');
        $completedTotal = $completedOrders->count();
        
        return view ('cms.index', compact('products', 'categories', 'users', 'orders','completedTotal',
        'completedOrders','orderTotal','archivedProducts','comInq','incInq', 'comInqTotal','incInqTotal','news'));
        
    }

    public function completeOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->completed = '1';
        $order->save();
        return back()->with('success', 'Order fullfilled');
    }

    public function archive(Request $request, $id)
    {
        $product = Product::find($id);
        $product->status = '1';
        $product->save();
        return back()->with('success', 'Product archived');
    }

    public function unArchive(Request $request, $id)
    {
        $product = Product::find($id);
        $product->status = '0';
        $product->save();
        return back()->with('success', 'Product restored');
    }

    public function hours(Request $request, $id)
    {
        $hours = Hours::find($id);
        $hours->hours = $request->input('hours');
        $hours->save();
        return redirect()->route('cms')->with('success', 'Work hours edited');
    }

    public function type(Request $request, $id)
    {
        $user = User::find($id);
        $user->type = $request->input('type');
        $user->save();
        return redirect()->route('cms')->with('success', 'User permissions edited');
    }
}
