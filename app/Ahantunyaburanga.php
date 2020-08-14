<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ahantunyaburanga extends Model
{
    protected $fillable=['image','name','description','user_id'];
    
    public function user()
    {
         return $this ->belongsTo(User::class, 'user_id');
    }
    public function comments()
    {
         return $this ->hasMany(Ahantunyaburangacomment::class);
    }
}
