<?php

namespace App\Http\Controllers;

use App\Imiganimigufi;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;

class ImiganimigufiController extends Controller
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
        $imiganimigufi_counts= Imiganimigufi::all()->where('status',1);
        $imiganimigufis = Imiganimigufi::orderBy('name','asc')->where('status',1)->paginate(200);
        return view('pages.ururimi.imiganiMigufi.index')->withImiganimigufis($imiganimigufis)->withImiganimigufi_counts($imiganimigufi_counts);
    }

    public function all_imiganimigu()
    {
        $imiganimigufis =Imiganimigufi::orderBy('name','asc')->paginate(100);
        return view('pages.ururimi.imiganiMigufi.dashboard_imiganimigufi')->withImiganimigufis($imiganimigufis); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ururimi.imiganiMigufi.create');
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
       'name' =>'required|unique:imiganimigufis',
       'igisobanuro'  =>'nullable'
   ));
        //store in the database
        $imiganimigufi =new Imiganimigufi;
        
        $imiganimigufi->user_id = Auth::user()->id;

        $imiganimigufi ->name =$request ->name;
        $imiganimigufi ->igisobanuro =$request ->igisobanuro;
       
        $imiganimigufi ->save();

        Session::flash('success','Urakoze kudusangiza uyu mugani! '.' '.$imiganimigufi->name);
        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imiganimigufi  $imiganimigufi
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $imiganimigufi =Imiganimigufi::where('name', '=',$name) ->first(); 
       return view('pages.ururimi.imiganiMigufi.show') ->withImiganimigufi($imiganimigufi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imiganimigufi  $imiganimigufi
     * @return \Illuminate\Http\Response
     */
    public function edit(Imiganimigufi $imiganimigufi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imiganimigufi  $imiganimigufi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imiganimigufi $imiganimigufi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imiganimigufi  $imiganimigufi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imiganimigufi $imiganimigufi)
    {
        //
    }

    public function imiganimigu_approval(Request $request)
    {
        $this ->validate($request, array(
       'imiganimiguId'  =>'required'
   )); 

    $imiganimigu =Imiganimigufi::find($request->imiganimiguId);

     $imiganimigu->status =$request->input('status');
      $imiganimigu ->save();

        Session::flash('success','Umugani '.' "'.$imiganimigu->name .' "'.' '.' Approved!');
        return redirect() ->back();
    }
}
