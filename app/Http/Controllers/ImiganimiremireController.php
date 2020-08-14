<?php

namespace App\Http\Controllers;

use App\Imiganimiremire;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;

class ImiganimiremireController extends Controller
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
        $imiganimire_counts= Imiganimiremire::all()->where('status',1);
        $imiganimires = Imiganimiremire::orderBy('id','desc')->where('status',1)->paginate(30);
        return view('pages.ururimi.imiganiMiremire.index')->withImiganimires($imiganimires)->withImiganimire_counts($imiganimire_counts);
    }

    public function all_imigani()
    {
        $imiganimires =Imiganimiremire::orderBy('id','desc')->paginate(100);
        return view('pages.ururimi.imiganiMiremire.dashboard_imiganimiremire')->withImiganimires($imiganimires); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ururimi.imiganiMiremire.create');
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
       'title' =>'required|unique:imiganimiremires',
       'body'  =>'required',
       'igisobanuro'  =>'nullable'
   ));
        //store in the database
        $imiganimiremire =new Imiganimiremire;
        
        $imiganimiremire->user_id = Auth::user()->id;

        $imiganimiremire ->title =$request ->title;
        $imiganimiremire ->body =$request ->body;
        $imiganimiremire ->igisobanuro =$request ->igisobanuro;
       
        $imiganimiremire ->save();

        Session::flash('success','Urakoze kudusangiza uyu mugani! '.' '.$imiganimiremire->title);
        return redirect() -> back();
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imiganimiremire  $imiganimiremire
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
         $imiganimiremire =Imiganimiremire::where('title', '=',$title) ->first(); 
       return view('pages.ururimi.imiganiMiremire.show') ->withImiganimiremire($imiganimiremire);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imiganimiremire  $imiganimiremire
     * @return \Illuminate\Http\Response
     */
    public function edit(Imiganimiremire $imiganimiremire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imiganimiremire  $imiganimiremire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imiganimiremire $imiganimiremire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imiganimiremire  $imiganimiremire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imiganimiremire $imiganimiremire)
    {
        //
    }

    public function imiganimire_approval(Request $request)
    {
        $this ->validate($request, array(
       'imiganimireId'  =>'required'
   )); 

    $imiganimire =Imiganimiremire::find($request->imiganimireId);

     $imiganimire->status =$request->input('status');
      $imiganimire ->save();

        Session::flash('success','Umugani '.$imiganimire->title .' '.' Approved');
        return redirect() ->back();
    }
}
