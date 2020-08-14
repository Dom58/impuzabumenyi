<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imiganimigufi extends Model
{
    protected $fillable=['name','user_id','igisobanuro','status'];
    
    public function user()
    {
         return $this ->belongsTo(User::class, 'user_id');
    }
}
