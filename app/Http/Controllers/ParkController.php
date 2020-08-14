<?php

namespace App\Http\Controllers;

use App\Park;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;


class ParkController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadmin|admin|editor|author', ['except'=>['show','index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $park_counts= Park::all()->where('status',1);
        $parks = Park::orderBy('name','asc')->where('status',1)->paginate(150);
        return view('pages.ubukerarugendo.park.index')->withParks($parks)->withPark_counts($park_counts);
    }
    public function all_bigPark(){
        $parks =Park::orderBy('id','desc')->paginate(100);
        return view('pages.ubukerarugendo.park.dashboard_park')->withParks($parks); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ubukerarugendo.park.create');
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
       'slug'  =>'required|alpha_dash|min:5|max:255|unique:parks',
       'image'=>'required',
       'description'  =>'required'
   ));
        //store in the database
        $park =new Park;
        
        $park->user_id = Auth::user()->id;

        $park ->name =$request ->name;
        $park ->slug =$request ->slug;
        $park ->description =$request ->description;
        
        //save our image
        if($request ->hasFile('image')){
            
             $image = $request ->file('image');
            
            $image->move(public_path().'/Parks',$image ->getClientOriginalName());
            
            $park->file_name=$image ->getClientOriginalName();
        }
       
        $park ->save();

        Session::flash('success',' '.$park->name.' Saved!!');
        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Park  $park
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $all_parks= Park::all()->where('status',1);
        $park =Park::where('slug', '=',$slug) ->first(); 
        return view('pages.ubukerarugendo.park.show')->withPark($park)->withAll_parks($all_parks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Park  $park
     * @return \Illuminate\Http\Response
     */
    public function edit(Park $park)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Park  $park
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Park $park)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Park  $park
     * @return \Illuminate\Http\Response
     */
    public function destroy(Park $park)
    {
        //
    }

    public function park_approval(Request $request)
    {
        $this ->validate($request, array(
       'parkId'  =>'required'
   )); 

    $park =Park::find($request->parkId);

     $park->status =$request->input('status');
      $park ->save();

        Session::flash('success',' '.$park->name.' Approved!!');
        return redirect() ->back();
    }
}
