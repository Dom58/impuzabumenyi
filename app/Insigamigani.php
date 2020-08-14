<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insigamigani extends Model
{
    protected $fillable=['name','user_id','body','status','slug'];
    
    public function user()
    {
         return $this ->belongsTo(User::class, 'user_id');
    }
}
