<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $guarded =[];
    /*
    allows fields in array submission, if left 
    empty avoid []->all due to security concerns
    */
}
