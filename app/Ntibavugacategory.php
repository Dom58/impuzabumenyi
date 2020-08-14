<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ntibavugacategory extends Model
{
    public function ntibavugas()
    {
        
         return $this ->hasMany('App\Ntibavuga');
    }
}
