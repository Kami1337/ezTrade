<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Tag extends Model
{
    protected $fillable = ['category'];
    public function products()
    {
        return $this->belongsToMany(Product::class);
        //App\Post::with('tags')->get();
        //grabs all posts associated with tags without doing double db query
    }

    public function getRouteKeyName()
    {
        return 'name';
        //returns above table associated with primary 
        //key instead of key itself for human friendly reading
    }
}
