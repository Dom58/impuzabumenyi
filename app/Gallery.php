<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{  
    protected $fillable=['image','title','user_id'];
    
    public function user()
    {
         return $this ->belongsTo(User::class, 'user_id');
    }

	public function category()
    {
        
         return $this ->belongsTo('App\Gallerycategory');
    }
    public function gallerycomments()
    {
         return $this ->hasMany('App\Gallerycomment');
    }
    public function replygalleries(){
        return $this ->hasMany('App\Replygallery');
    }
}
