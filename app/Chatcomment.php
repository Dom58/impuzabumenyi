<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatcomment extends Model
{
	protected $fillable=['comment','chat_id','user_id'];
	 
    public function chat()
    {
         return $this ->belongsTo(Chat::class, 'chat_id');
    }

    public function user()
    {
         return $this ->belongsTo(User::class, 'user_id');
    }
   
}
