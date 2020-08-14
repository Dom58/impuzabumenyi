<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\file;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use App\Post;
use App\Storycomment;
use App\Replycomment;
use App\Category;
use Image;
// use Storage;
use Session;
use Auth;
use App\User;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:superadmin|admin|editor|author', ['except'=>['show','storyComment','storyReply']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $s =$request->input('s');
        $posts = Post::orderBy('id','desc')->search($s) ->paginate(50);
       return view('posts.index')->withPosts($posts)->withS($s);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Category::all();
       return view('posts.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
   $this ->validate($request, array(
       'title' =>'required|max:255',
       'slug'  =>'required|alpha_dash|min:5|max:255|unique:posts',
       'image'=>'required',
        'category_id' =>'required|integer',
       'body'  =>'required'
   ));
        //store in the database
        $post =new Post;
        
        
        $post->user_id = Auth::user()->id;

//        $post ->editor=$request ->editor;
        $post ->title =$request ->title;
        $post ->slug =$request ->slug;
       $post ->category_id =$request ->category_id;
        $post ->body =$request ->body;
        
        //save our image
        if($request ->hasFile('image')){
            
             $image = $request ->file('image');
            
            $image->move(public_path().'/postsImage',$image ->getClientOriginalName());
            
            $post->file_name=$image ->getClientOriginalName();
             $post->file_size=$image ->getClientSize();
            $post->file_type=$image ->getClientMimeType();
            
        }
       
        $post ->save();
        
        
        Session::flash('success','Urakoze kudusangiza iyi nkuru!');
       //return redirect()->route('posts.show', $post ->id);
        return redirect() -> route('posts.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post =Post::where('slug', '=',$slug)->increment('visit_post');
        $post =Post::where('slug', '=',$slug) ->first();
        Session::put('slug',$slug);
        
       return view('posts.show') ->withPost($post);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post =Post::find($id);
        return view('posts.edit') ->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post =Post::find($id);
        
        if($request ->input('slug') ==$post ->slug){
         
             $this ->validate($request, array(
       'title' =>'required|max:255',
       'body'  =>'required',
       'status'  =>'required'
 
   ));
        }
        else{
         //validate the data
    $this ->validate($request, array(
       'title' =>'required|max:255',
       'slug'  =>'required|alpha_dash|min:5|max:255|unique:posts',
      // 'category_id' =>'required|integer',
       'body'  =>'required',
       'status'  =>'required'
       // 'image'=>'image'
   )); 
        }
        //save the data to the database
        $post =Post::find($id);
        $post ->title =$request ->title;
        $post ->slug =$request ->slug;
        $post ->body =$request ->body;
        $post->status =$request->input('status');
       
        $post ->save();
        
         Session::flash('success','Urakoze, Guhindura inkuru bikozwe neza!');
        return redirect() -> route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        unlink(public_path('postsImage/'.$post->file_name));
        // Storage::delete($post->image);
         $post ->delete();
        Session::flash('success','Post Deleted!');
        return redirect() -> route('posts.index');
    }
    // +++++++++++++++++++++start new ++++++++++++++++++++++
    public function storyComment(Request $request){

        $this ->validate($request, [
           'post_id' =>'exists:posts,id|numeric' ,
            'comment' =>'required|max:600'
        ]);
        $comment = new Storycomment;
         $comment ->user_id= Auth::user()->id;
         $comment ->post_id =$request->post_id;
         $comment->comment=$request->comment;
        $comment ->save();
        
         Session::flash('success','Urakoze kugira icyo uvuga kuri iyi nkuru!!');
         return redirect()->back();


    }
    public function storyReply(Request $request){

        $this ->validate($request, [
           'storycomment_id' =>'exists:storycomments,id|numeric' ,
            'reply' =>'required|max:400'
        ]);
        $reply = new Replycomment;
         $reply ->user_id= Auth::user()->id;
         $reply ->storycomment_id =$request->storycomment_id;
         $reply->reply=$request->reply;
        $reply ->save();
        
         Session::flash('success','Comment Replied!');
         return redirect()->back();
    }

    public function comment_approval(Request $request)
    {
        
    $this ->validate($request, array(
       'commentId'  =>'required'
   )); 

    $comment =Storycomment::find($request->commentId);

     $comment->status =$request->input('status');
      $comment ->save();

        Session::flash('success','Comment Approved');
        return redirect() ->back();
}

    public function reply_approval(Request $request)
    {
        
    $this ->validate($request, array(
       'replyId'  =>'required'
   )); 

    $reply =Replycomment::find($request->replyId);
    
     $reply->status =$request->input('status');
      $reply ->save();

        Session::flash('success','Reply Comment Approved');
        return redirect() ->back();

    }
// +++++++++Deleting reply and comment ++++++++++++++++
    public function destroycomment($id){

        $reply = Storycomment::find($id);
        $reply ->delete();

        Session::flash('success','Comment was Deleted!!!');
        return redirect() ->back();
    }
    
    public function destroyreply($id){

        $reply = Replycomment::find($id);
        $reply ->delete();

        Session::flash('success','Comment Reply Deleted!!!');
        return redirect() ->back();
    }
}
