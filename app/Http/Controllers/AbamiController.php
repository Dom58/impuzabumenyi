<?php

namespace App\Http\Controllers;

use App\Abami;
use Illuminate\Http\Request;
use Session;
use App\Abamicategory;
use App\User;
Use Auth;

class AbamiController extends Controller
{
      public function __construct()
    {
        $this->middleware('role:superadmin|admin|editor|author', ['except'=>['show','all_kings']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $trashedkings =King::onlyTrashed();
        $kings =Abami::orderBy('id','asc')->paginate(200);
        return view('pages.amateka.abami.index')->withKings($kings);
    }

    public function all_kings(){
        $abamis = Abami::orderBy('id','desc')->where('status',1)->paginate(200);
        return view('pages.amateka.abami.all_king')->withAbamis($abamis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Abamicategory::all();
        return view('pages.amateka.abami.create');
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
       'name' =>'required|unique:abamis',
       'image'=>'sometimes',
       'history'  =>'required'
   ));
        //store in the database
        $king =new Abami;
        
        $king->user_id = Auth::user()->id;

        $king ->name =$request ->name;
        // $king ->kingcategory_id =$request ->kingcategory_id;
        $king ->history =$request ->history;
        
        //save our image
        if($request ->hasFile('image')){
            
             $image = $request ->file('image');
            
            $image->move(public_path().'/kings',$image ->getClientOriginalName());
            
            $king->file_name=$image ->getClientOriginalName();
        }
       
        $king ->save();

        Session::flash('success','King Saved! '.' '.$king->name);
        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Abami  $abami
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        // $categories= Animalcategory::all();
        $king = Abami::where('name','=',$name)->where('status',1)->first();
       return view('pages.amateka.abami.show') ->withKing($king);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abami  $abami
     * @return \Illuminate\Http\Response
     */
    public function edit(Abami $abami)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Abami  $abami
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abami $abami)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Abami  $abami
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abami $abami)
    {
        //
    }
}
