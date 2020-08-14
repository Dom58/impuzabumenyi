<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ahantunyaburangacomment extends Model
{
    protected $fillable=['email','name','ahantunyaburanga_id','comment'];
    
    public function ahantunyaburanga()
    {
         return $this ->belongsTo(Ahantunyaburanga::class, 'ahantunyaburanga_id');
    }
}
