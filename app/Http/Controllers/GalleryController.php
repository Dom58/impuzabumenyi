<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use App\Gallerycategory;
use Image;
use App\User;
use Auth;
use App\Gallerycomment;
use App\Replygallery;
Use Session;

class GalleryController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth', ['except'=>['show','index','allgallery']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo_counts= Gallery::all()->where('status',1); 
        $categories = Gallerycategory::all();
        $galleries= Gallery::where('status',1)->orderBy('id','desc')->paginate(100);
        return view('pages.gallery.index')->withGalleries($galleries)->withCategories($categories)->withPhoto_counts($photo_counts);
    }

   public function gallery_dashboard() {
        $gallerycomments = Gallerycomment::orderBy('id','desc')->paginate(100);
      $gallerycommentall = Gallerycomment::all();
      $galleryreplycomments =Replygallery::orderBy('id','desc')->paginate(100);
      $galleryreplycommentall = Replygallery::all();
      
      return view('pages.gallery.gallerystatistic_dashboard')->withGallerycommentall($gallerycommentall)->withGalleryreplycommentall($galleryreplycommentall)-> withGallerycomments($gallerycomments)-> withGalleryreplycomments($galleryreplycomments);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Gallerycategory::all();
        return view('pages.gallery.create')->withCategories($categories);
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
       'title' =>'required|max:40',
       'image'=>'required|image|mimes:jpg,png,gif,jpeg,bmp,tif',
       'category_id' =>'required|integer',
       'description'  =>'nullable|max:400'
   ));
        $gallery =new Gallery;
        
        $gallery->user_id = Auth::user()->id;

        $gallery ->title =$request ->title;
        $gallery ->category_id =$request ->category_id;
        $gallery ->description =$request ->description;

        //save our image
        if($request ->hasFile('image')){
            
             $image = $request ->file('image');
            $image->move(public_path().'/gallery_Image',$image ->getClientOriginalName());
            
            $gallery->file_name=$image ->getClientOriginalName();
            $gallery->file_size=$image ->getClientSize();
            $gallery->file_type=$image ->getClientMimeType();
        }
        $gallery ->save();
        
        Session::flash('success','Thank You! '.' Image Saved to Gallery.'.'Wait Few Hours Your Image will be confirmed and Display to Images Field as Gallery Image. '.' And we will confirm you very soon!');
        // return redirect() -> route('gusengagallerys.index');
        return redirect()->route('gallery.show', $gallery ->file_name);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($file_name)
    {
        $gallery =Gallery::where('file_name','=',$file_name)->first();
       return view('pages.gallery.show') ->withGallery($gallery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
    }

    public function approve_photo(Request $request){
        $this ->validate($request, array(
       'photoId'  =>'required'
   )); 

    $gallery =Gallery::find($request->photoId);
    
     $gallery->status =$request->input('status');
      $gallery ->save();

        //Session::flash('success','Approved');
        return redirect() ->back();
    }

    public function allgallery(){

        $galleries=Gallery::orderBy('id','desc')->paginate(100);
        return view('pages.gallery.images_gallery')->withGalleries($galleries);
    }

    public function imageComment(Request $request){
        $this ->validate($request, [
           'gallery_id' =>'exists:galleries,id|numeric' ,
            'comment' =>'required|max:300'
        ]);
        $comment = new Gallerycomment;
         $comment ->user_id= Auth::user()->id;
         $comment ->gallery_id =$request->gallery_id;
         $comment->comment=$request->comment;
        $comment ->save();
        
         Session::flash('success','Photo Successfully Commented!');
         return redirect()->back();
    }
    public function photoReply(Request $request){

        $this ->validate($request, [
           'gallerycomment_id' =>'exists:gallerycomments,id|numeric' ,
            'reply' =>'required|max:200'
        ]);
        $reply = new Replygallery;
         $reply ->user_id= Auth::user()->id;
         $reply ->gallerycomment_id =$request->gallerycomment_id;
         $reply->reply=$request->reply;
        $reply ->save();
        
         Session::flash('success','Comment Replied!');
         return redirect()->back();
    }
    public function  approve_comment(Request $request){
         $this ->validate($request, array(
       'commentId'  =>'required'
   )); 

    $comment =Gallerycomment::find($request->commentId);

     $comment->status =$request->input('status');
      $comment ->save();

        Session::flash('success','Gallery Comment Approved');
        return redirect() ->back();
    }

    public function approve_reply(Request $request){
        $this ->validate($request, array(
       'replyId'  =>'required'
   )); 

    $reply = Replygallery::find($request->replyId);
    
     $reply->status =$request->input('status');
      $reply ->save();

        Session::flash('success','Reply Gallery Comment Approved');
        return redirect() ->back();
    }
//     destroycomment
// destroyreply
// +++++++++Deleting reply and comment Gallery++++++++++++++++
    public function destroycomment($id){

        $reply = Gallerycomment::find($id);
        $reply ->delete();

        Session::flash('success','Comment was Deleted!!!');
        return redirect() ->back();
    }
    
    public function destroyreply($id){

        $reply = Replygallery::find($id);
        $reply ->delete();

        Session::flash('success','Comment Reply Deleted!!!');
        return redirect() ->back();
    }
   

}
