<?php

namespace App;

use Carbon\Carbon;
use App\Tag;
use Laravel\Scout\Searchable;
use Illuminate\Http\Request;

class Product extends Model{
use Searchable;
public $asYouType = true;

public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {   
        $user_id=auth()->id();
        $this->comments()->create(compact('body','user_id'));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images($id)
    {
        $product = Product::find($id);
        return json_decode($product->filename);
    }
 
    public function coverImage($id)
    {
        return $this->images($id)[0];
    }

    public function scopeFilter($query, $filters)
    {
        if(isset($filter['month']))
        {
            if($month = $filters['month'])
            {
                $query->whereMonth('created_at', Carbon::parse($month)->month);
            }
            if($year = $filters['year'])
            {
                $query->whereYear('created_at', $year);
            }
        }
    }
    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year','month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();    
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function index()
    {
        return $this->id;
    }
}
