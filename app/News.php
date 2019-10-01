<?php

namespace App;

use App\User;
class News extends Model
{

    public function images($id)
    {
        $news = News::find($id);
        return json_decode($news->filename);
    }
    public function coverImage($id)
    {
        return $this->images($id)[0];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
