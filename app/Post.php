<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	public function scopeSearch($query, $s){
		return $query->where('title','like','%' .$s. '%')->orwhere('body','like','%' .$s. '%');
	} 
// +++++++++++++++++++++++++ Search using tinker in cmd by get() method +++++++++++++++++++++++++++
    public function user()
    {
         return $this ->belongsTo(User::class, 'user_id');
    }
    
    public function  postcomments()
    {
         return $this ->hasMany('App\Storycomment');
    }
    
    
     public function category()
    {
        
         return $this ->belongsTo('App\Category');
    }
}
