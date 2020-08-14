<?php

namespace App\Http\Controllers;

use App\Museum;
use Illuminate\Http\Request;
use App\user;
use Auth;
use Session;

class MuseumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $museum_counts= Museum::all()->where('status',1);
        $museums = Museum::orderBy('name','asc')->where('status',1)->paginate(150);
        return view('pages.ubukerarugendo.museum.index')->withMuseums($museums)->withMuseum_counts($museum_counts);
    }

    public function all_museum(){
        $museums =Museum::orderBy('id','desc')->paginate(100);
        return view('pages.ubukerarugendo.museum.dashboard_museum')->withMuseums($museums); 
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ubukerarugendo.museum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    // image name slug description
        $this ->validate($request, array(
       'name' =>'required|max:50',
       'slug'  =>'required|alpha_dash|min:5|max:255|unique:museums',
       'image'=>'required',
       'description'  =>'required'
   ));
        //store in the database
        $museum =new Museum;
        
        $museum->user_id = Auth::user()->id;

        $museum ->name =$request ->name;
        $museum ->slug =$request ->slug;
        $museum ->description =$request ->description;
        
        //save our image
        if($request ->hasFile('image')){
            
             $image = $request ->file('image');
            
            $image->move(public_path().'/museums',$image ->getClientOriginalName());
            
            $museum->file_name=$image ->getClientOriginalName();
        }
       
        $museum ->save();

        Session::flash('success',' '.$museum->name.' Saved!!');
        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $all_museums= Museum::all()->where('status',1);
        $museum = Museum::where('slug', '=',$slug) ->first(); 
        return view('pages.ubukerarugendo.museum.show')->withMuseum($museum)->withAll_museums($all_museums);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function edit(Museum $museum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Museum $museum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Museum $museum)
    {
        //
    }

    public function museum_approval(Request $request)
    {
        $this ->validate($request, array(
       'museumId'  =>'required'
   )); 

    $museum =Museum::find($request->museumId);

     $museum->status =$request->input('status');
      $museum ->save();

        Session::flash('success',' '.$museum->name.' Approved!!');
        return redirect() ->back();
    }
}
