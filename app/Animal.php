<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
	use SoftDeletes;
	
    protected $fillable=['image','name','description','slug','user_id','animalcategory_id','deleted_at'];
    
    public function user()
    {
         return $this ->belongsTo(User::class, 'user_id');
    }

    public function animalcategory()
    {
         return $this ->belongsTo(Animalcategory::class, 'animalcategory_id');
    }
}
