<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use SoftDeletes;
    
	protected $fillable=['body','title','user_id','deleted_at'];
	
   public function user()
    {
         return $this ->belongsTo(User::class, 'user_id');
    }
    public function  chatcomments()
    {
         return $this ->hasMany('App\Chatcomment');
    }
}