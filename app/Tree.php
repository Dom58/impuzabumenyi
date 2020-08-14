<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tree extends Model
{
	use SoftDeletes;

    protected $fillable=['image','name','description','slug','user_id','treecategory_id','deleted_at'];
    
    public function user()
    {
         return $this ->belongsTo(User::class, 'user_id');
    }

    public function treecategory()
    {
         return $this ->belongsTo(Treecategory::class, 'treecategory_id');
    }
}
