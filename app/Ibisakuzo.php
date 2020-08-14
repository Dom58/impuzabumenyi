<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ibisakuzo extends Model
{
    protected $fillable=['name','slug','user_id','kice'];
    
    public function user()
    {
         return $this ->belongsTo(User::class, 'user_id');
    }
}
