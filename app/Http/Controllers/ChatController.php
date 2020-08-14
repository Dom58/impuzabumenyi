<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use Auth;
use App\Chatcomment;
// use App\Post;
use App\User;
use Session;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allchats =Chat::all()->where('status',1);
        $chats = Chat::orderBy('id','desc')->where('status',1)->paginate(5);
         return view('pages.chat.index')->withChats($chats)->withAllchats($allchats);
    }
    public function managerchat(){
        $comments= Chatcomment::all();
         $trashedchats =Chat::onlyTrashed();
        $chats =Chat::all();
        $allchats =Chat::orderBy('id','desc')->paginate(100);
        return view('pages.chat.chatdashboard')->withAllchats($allchats)->withChats($chats)->withComments($comments)->withTrashedchats($trashedchats);
    }

    public function all_trashed()
    {
        $chats = Chat::onlyTrashed()->orderBy('deleted_at','desc')->paginate(100);
        return view('pages.chat.trashed_chat')->withchats($chats);
        // pages.ibidukikije.chatStore.chat.index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request, array(
       'title' =>'required|max:100|unique:chats',
       'image'=>'sometimes',
       'body'  =>'required'
   ));
        //store in the database
        $tuganire =new Chat;
        
        $tuganire->user_id = Auth::user()->id;
        $tuganire ->title =$request ->title;
        $tuganire ->body =$request ->body;
        //save our image
        if($request ->hasFile('image'))
        {
            
             $image = $request ->file('image');
            
            $image->move(public_path().'/chatImage',$image ->getClientOriginalName());
            
            $tuganire->file_name=$image ->getClientOriginalName(); 
        }
       
        $tuganire ->save();
        
        
        Session::flash('success','Urakoze kudusangiza igitekerezo!');
        return redirect() -> route('tuganire.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        return view('pages.chat.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Chat::destroy($id);

        Session::flash('success','Chat Saved to Trashed!');
        return redirect() -> back();
    }
    //restore an Animal
    public function restore_chat(Request $request){
        $this ->validate($request, array(
       'trashchat_id'  =>'required',
       'deleted_at'  =>'nullable'
   )); 
        $chat = Chat::withTrashed()->find($request->trashchat_id);
         $chat ->restore();

     // $chat->deleted_at =$request->deleted_at;
      $chat ->save();

// $sms ='please Verify or <a href="'.url("/retore").'"> UNDO </a> Email';
     Session::flash('success',' '.$chat->title.' '.'Retored Successful!!');
        return redirect()->back();       
    }

    public function delete_chat($id)
    {
          //First way
          //Second Way
      if (empty($tuganire->file_name)) {
        $tuganire = Chat::withTrashed()->findOrFail($id);
        $comment = Chatcomment::where('chat_id', '=',$id);
        $comment -> delete();
      //delete DB record
        $tuganire ->forceDelete();
        
        Session::flash('success','Chat Deleted!!');
        return redirect() -> back();
      }

      elseif (!empty($tuganire->file_name)) {
        $tuganire = Chat::withTrashed()->findOrFail($id);
        $comment = Chatcomment::where('chat_id', '=',$id);
        

        unlink(public_path('chatImage/'.$tuganire->file_name));

            $comment -> delete();
          $tuganire ->forceDelete();
        Session::flash('success','Chat Deleted!');
        return redirect() -> back();
      }
      
    }

    public function chat_approval( Request $request){

        $this ->validate($request, array(
       'chatId'  =>'required'
   )); 

    $chat_approval = Chat::find($request->chatId);

     $chat_approval->status =$request->input('status');
      $chat_approval ->save();

        Session::flash('success','Chat Approved');
        return redirect() ->back();
    }
    
    // ++++++++++++++++++
    public function chat_comment(Request $request)
    {
        $this ->validate($request, [
           'chat_id' =>'exists:chats,id|numeric' ,
            'comment' =>'required|max:400'
        ]);
        $comment = new Chatcomment;
         $comment ->user_id= Auth::user()->id;
         $comment ->chat_id =$request->chat_id;
         $comment->comment=$request->comment;
        $comment ->save();
        
         Session::flash('success','Urakoze kugira icyo uvuga kuri iyi nkuru!!');
         return redirect()->back();
    }

    public function chatcomment_approval( Request $request){
    
    $this ->validate($request, array(
       'commentId'  =>'required'
   )); 

    $comment = Chatcomment::find($request->commentId);

     $comment->status =$request->input('status');
      $comment ->save();

        Session::flash('success','Comment Approved');
        return redirect() ->back();
    }

    public function chatcomment_delete( $id){

    $comment = Chatcomment::findOrFail($id);

      $comment ->delete();

        Session::flash('success','Comment Deleted');
        return redirect() ->back();
    }

    public function chatcomment_statistic()
    {
        $chatcomments = Chatcomment::orderBy('id','desc')->paginate(100);
      $chatcommentall = Chatcomment::all();
      // $galleryreplycomments =Replygallery::orderBy('id','desc')->paginate(100);
      // $galleryreplycommentall = Replygallery::all();
      
      return view('pages.chat.chatcomment_statistic')->withChatcommentall($chatcommentall)-> withChatcomments($chatcomments);
    }
}
