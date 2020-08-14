<?php

namespace App\Http\Controllers;

use App\Insigamigani;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;

class InsigamiganiController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadmin|admin|editor|author', ['except'=>['show','all_insigamigani']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insigamigani_counts= Insigamigani::all();
        $insigamiganis = Insigamigani::orderBy('id','desc')->paginate(30);
        return view('pages.amateka.insigamigani.index')->withInsigamiganis($insigamiganis)->withInsigamigani_counts($insigamigani_counts);
    }
    public function all_insigamigani(){
         $insigamigani_counts= Insigamigani::all()->where('status',1);
        $insigamigani = Insigamigani::orderBy('id','desc')->where('status',1)->paginate(100);
        return view('pages.amateka.insigamigani.all_insigamigani')->withInsigamigani($insigamigani)->withInsigamigani_counts($insigamigani_counts);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.amateka.insigamigani.create');
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
       'name' =>'required',
       'slug'  =>'required|max:40|unique:insigamiganis',
       'body'  =>'required'
   ));
        //store in the database
        $insigamigani =new Insigamigani;
        
        $insigamigani->user_id = Auth::user()->id;

        $insigamigani ->name =$request ->name;
        $insigamigani ->slug =$request ->slug;
        $insigamigani ->body =$request ->body;
       
        $insigamigani ->save();

        Session::flash('success','Urakoze kudusangiza uyu Insigamugani! '.' '.$insigamigani->name);
        return redirect() -> back();
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Insigamigani  $insigamigani
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $all_insigamigani= Insigamigani::all()->where('status',1);
        $insigamigani = Insigamigani::where('slug', '=',$slug) ->first(); 
        return view('pages.amateka.insigamigani.show')->withInsigamigani($insigamigani)->withAll_insigamigani($all_insigamigani);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Insigamigani  $insigamigani
     * @return \Illuminate\Http\Response
     */
    public function edit(Insigamigani $insigamigani)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Insigamigani  $insigamigani
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insigamigani $insigamigani)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Insigamigani  $insigamigani
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insigamigani $insigamigani)
    {
        //
    }
    
    public function approve_insigamigani(Request $request)
    {
        $this ->validate($request, array(
       'insigamuganiId'  =>'required'
   )); 

    $insigamigani =Insigamigani::find($request->insigamuganiId);

     $insigamigani->status =$request->input('status');
      $insigamigani ->save();

        Session::flash('success',' '.$insigamigani->name.' Successfully Approved!!');
        return redirect() ->back();
    }
}
