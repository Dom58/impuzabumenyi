<?php

namespace App\Http\Controllers;

use App\Ibikoreshogakondo;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;

class IbikoreshogakondoController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadmin|admin|editor|author', ['except'=>['show','index','create']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gakondo_counts= Ibikoreshogakondo::all()->where('status',1);
        $gakondos = Ibikoreshogakondo::orderBy('name','asc')->where('status',1)->paginate(150);
        return view('pages.gakondo.ibikoresho.index')->withGakondos($gakondos)->withGakondo_counts($gakondo_counts);
    }

    public function allibikoresho()
    {
        $gakondos =Ibikoreshogakondo::orderBy('id','desc')->paginate(100);
        return view('pages.gakondo.ibikoresho.dashboardibikoresho_gakondo')->withGakondos($gakondos); 
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.gakondo.ibikoresho.create');
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
       'name' =>'required|max:50',
       'slug'  =>'required|alpha_dash|min:5|max:255|unique:ibikoreshogakondos',
       'image'=>'required',
       'description'  =>'required'
   ));
        //store in the database
        $gakondo =new Ibikoreshogakondo;
        
        $gakondo->user_id = Auth::user()->id;

        $gakondo ->name =$request ->name;
        $gakondo ->slug =$request ->slug;
        $gakondo ->description =$request ->description;
        
        //save our image
        if($request ->hasFile('image')){
            
             $image = $request ->file('image');
            
            $image->move(public_path().'/ibikoreshoGakondo',$image ->getClientOriginalName());
            
            $gakondo->file_name=$image ->getClientOriginalName();
        }
       
        $gakondo ->save();

        Session::flash('success','Urakoze kudusangiza iki gikoresho! '.' '.$gakondo->name);
        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ibikoreshogakondo  $ibikoreshogakondo
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $gakondo =Ibikoreshogakondo::where('slug', '=',$slug) ->first(); 
       return view('pages.gakondo.ibikoresho.show') ->withGakondo($gakondo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ibikoreshogakondo  $ibikoreshogakondo
     * @return \Illuminate\Http\Response
     */
    public function edit(Ibikoreshogakondo $ibikoreshogakondo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ibikoreshogakondo  $ibikoreshogakondo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ibikoreshogakondo $ibikoreshogakondo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ibikoreshogakondo  $ibikoreshogakondo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ibikoreshogakondo $ibikoreshogakondo)
    {
        //
    }

     public function ibikoresho_approval(Request $request)
    {
        $this ->validate($request, array(
       'ibikoreshoId'  =>'required'
   )); 

    $gakondo =Ibikoreshogakondo::find($request->ibikoreshoId);

     $gakondo->status =$request->input('status');
      $gakondo ->save();

        Session::flash('success','Igikoresho Gakondo Approved');
        return redirect() ->back();
    }
    
}
