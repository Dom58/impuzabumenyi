<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treecategory extends Model
{
    public function trees()
    { 
         return $this ->hasMany('App\Tree');
    }
}
