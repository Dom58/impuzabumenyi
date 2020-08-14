<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replygallery extends Model
{
    protected $fillable=['reply','gallerycomment_id','user_id'];

    public function gallerycomment()
    {
         return $this ->belongsTo(Gallerycomment::class, 'gallerycomment_id');
    }

    public function user()
    {
         return $this ->belongsTo(User::class, 'user_id');
    }
}
