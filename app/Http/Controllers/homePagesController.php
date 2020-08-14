<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Contact;
use App\user;

use App\Webmanagement;
use App\Itangazo;
use App\Storycomment;
use App\Replycomment;
class homePagesController extends Controller
{
    public function getIndex(){
        // $posts = Post::orderBy('id','desc') ->paginate(8);
        // return view('/welcome')->withPosts($posts);
}
    
    
    Public function getWelcome(){
        return view('pages.welcomeLogin');
    }
    
   
    Public function maindashboard(){
      $postcomments = Storycomment::orderBy('id','desc')->paginate(100);
      $postcommentall = Storycomment::all();
      $postreplycomments =Replycomment::orderBy('id','desc')->paginate(100);
      $postreplycommentall = Replycomment::all();

      
      return view('pages.roles.maindashboard')->withPostcommentall($postcommentall)->withPostreplycommentall($postreplycommentall)-> withPostcomments($postcomments)-> withPostreplycomments($postreplycomments);
    }


     Public function getAdminPanel()
     {
        $contacts = Contact::orderBy('id','desc') ->paginate(100);
        return view('pages.roles.admin')->withContacts($contacts);
    }

    Public function getProfile(User $id){
// Unchecked well the codes
        $user = User::where('id', $id)->first();
        return view('pages.profile')->withUser($user);
    }
    

Public function getNews(){
    
$news = Itangazo::where('status',1)->orderBy('id','desc')->paginate(30);
  return view('mainPage')->withNews($news) ;
  }

   

}
