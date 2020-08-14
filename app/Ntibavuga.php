<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ntibavuga extends Model
{
	protected $fillable=['ntibavuga','ntibavugacategory_id','bavuga','user_id','igisobanuro'];

    public function user()
    {
         return $this ->belongsTo(User::class,'user_id');
    }

    public function ntibavugacategory()
    {
        
         return $this ->belongsTo('App\Ntibavugacategory');
    }
}