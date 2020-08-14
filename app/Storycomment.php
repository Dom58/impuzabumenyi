<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storycomment extends Model
{
	 protected $fillable=['comment','post_id','user_id'];
	 
    public function story()
    {
         return $this ->belongsTo(Post::class, 'post_id');
    }

    public function  replycomments()
    {
         return $this ->hasMany('App\Replycomment');
    }

    public function user()
    {
         return $this ->belongsTo(User::class, 'user_id');
    }
}
