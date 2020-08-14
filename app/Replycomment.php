<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replycomment extends Model
{
	protected $fillable=['reply','storycomment_id','post_id','user_id'];

    public function comment()
    {
         return $this ->belongsTo(Storycomment::class,'storycomment_id');
    }
    
    public function user()
    {
         return $this ->belongsTo(User::class, 'user_id');
    }
}
