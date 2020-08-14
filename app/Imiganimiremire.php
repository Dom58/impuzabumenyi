<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imiganimiremire extends Model
{
    protected $fillable=['title','body','user_id','igisobanuro','status'];
    
    public function user()
    {
         return $this ->belongsTo(User::class, 'user_id');
    }
}
