<?php

namespace App\Http\Controllers;

use App\Pub;
use Illuminate\Http\Request;
use App\file;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Auth;
use Session;
Use App\User;

class PubController extends Controller
{
      public function __construct()
    {
        $this->middleware('role:superadmin|admin', ['except'=>['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s =$request->input('s');
        $pubs = Pub::orderBy('id','desc')->paginate(10);
        return view('pages.publicity.index')->withPubs($pubs) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('pages.publicity.create');
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
       'image'  =>'required',
       'description'  =>'required',
       'pub_link'  =>'url|nullable|',
       'side'=>'integer|required'
   ));



        //store in the database
        $pub =new Pub;
        
        $pub->user_id = Auth::user()->id;
       
        $pub ->side =$request ->side;
        $pub ->pub_link =$request ->pub_link;
        $pub ->description =$request ->description;
        //save our image
        if($request ->hasFile('image')){
            
             $image = $request ->file('image');
            
            $image->move(public_path().'/publicity',$image ->getClientOriginalName());
            
            $pub->file_name=$image ->getClientOriginalName();
            $pub->file_size=$image ->getClientSize();
            $pub->file_type=$image ->getClientMimeType();
        }
       
        $pub ->save();
        Session::flash('success','publicity Saved Successfully');
       return redirect()->route('pubs.show', $pub ->id);
        //return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function show(Pub $pub)
    {
        $pub=Pub::find($pub ->id);
        return view('pages.publicity.show') ->withPub($pub);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function edit(Pub $pub)
    {
         $pub =Pub::find($pub->id);
         return view('pages.publicity.edit') ->withPub($pub);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
         //validate the data
    $this ->validate($request, array(
       'pub_link' =>'required|max:255',
       'description' =>'required',
       'status'  =>'required'
   )); 
      
        //save the data to the database
        $pub =Pub::find($id);
        $pub ->pub_link =$request ->pub_link;
        $pub ->description =$request ->description;
        $pub->status =$request->input('status');
        //save our image
       
       
        $pub->save();
        
         Session::flash('success','Pub Updated');
        return redirect() -> route('pubs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pub  $pub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pub $pub)
    {
        //
    }
    public function approval(Request $request)
    {
        
    $this ->validate($request, array(
       'pubId'  =>'required'
   )); 

    $pub =Pub::find($request->pubId);
    
      
     $pub->status =$request->input('status');
      $pub ->save();

        Session::flash('success','Pub Approved');
        return redirect() ->back();

    }
}
