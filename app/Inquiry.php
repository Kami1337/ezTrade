<?php

namespace App;

class Inquiry extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
