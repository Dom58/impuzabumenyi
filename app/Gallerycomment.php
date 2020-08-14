<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallerycomment extends Model
{
     protected $fillable=['comment','gallery_id','user_id'];
     
    public function gallery()
    {
         return $this ->belongsTo(Gallery::class,'gallery_id');
    }

    public function user()
    {
         return $this ->belongsTo(User::class, 'user_id');
    }

    public function  replygalleries()
    {
         return $this ->hasMany('App\Replygallery');
    }
}
