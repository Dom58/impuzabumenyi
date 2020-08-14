<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webmanagement extends Model
{
    
     public function department()
    {
        
         return $this ->belongsTo(Department::class,'department_id');
    }
}
