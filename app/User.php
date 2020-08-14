<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait; // add this trait to your user model

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','sname','username','gender','tel','district',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function Posts()
    {
         return $this ->hasMany(Post::class);
    }

    public function ibikoreshogakondos()
    {
         return $this ->hasMany(Ibikoreshogakondo::class);
    }
    public function imyambarogakondos()
    {
         return $this ->hasMany(Imyambarogakondo::class);
    }
    public function ahantunyaburangas()
    {
         return $this ->hasMany(Ahantunyaburanga::class);
    }

    public function ntibavuga()
    {
         return $this ->hasMany(Ntibavuga::class);
    }
    public function ibisakuzo()
    {
         return $this ->hasMany(Ibisakuzo::class);
    }
    public function imiganimiremire()
    {
         return $this ->hasMany(Imiganimiremire::class);
    }

    public function imiganimigufi()
    {
         return $this ->hasMany(Imiganimigufi::class);
    }
    public function parks()
    {
         return $this ->hasMany(Park::class);
    }
    public function museums()
    {
         return $this ->hasMany(Museum::class);
    }

    //Ibidukikije
    public function animals()
    {
         return $this ->hasMany(Animal::class);
    }

    public function trees()
    {
         return $this ->hasMany(Tree::class);
    }

    public function kings()
    {
         return $this ->hasMany(Abami::class);
    }

    public function insigamiganis()
    {
         return $this ->hasMany(Insigamigani::class);
    }
    

    public function chats()
    {
         return $this ->hasMany(Chat::class);
    }
    // The comments
    
    public function comments()
    {
         return $this ->hasMany('App\Comment');
    }

    public function storycomments()
    {
         return $this ->hasMany('App\Storycomment');
    }
    public function chatcomments()
    {
         return $this ->hasMany('App\Chatcomment');
    }
    
    public function replycomments()
    {
         return $this ->hasMany('App\Replycomment');
    }

    
    public function contacts()
    {
         return $this ->hasMany(Contact::class);
    }
    
    public function pubs()
    {
         return $this ->hasMany(Pub::class);
    }
    public function itangazos()
    {
         return $this ->hasMany(Itangazo::class);
    }
   
    public function carousels()
    {
         return $this ->hasMany('App\Carousel');
    }
    public function galleries()
    {
         return $this ->hasMany('App\Gallery');
    }
    public function gallerycomments()
    {
         return $this ->hasMany('App\Gallerycomment');
    }
    public function  replygalleries()
    {
         return $this ->hasMany('App\Replygallery');
    }
}
