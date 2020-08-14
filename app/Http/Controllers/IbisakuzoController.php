<?php

namespace App\Http\Controllers;

use App\Ibisakuzo;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;

class IbisakuzoController extends Controller
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
        $ibisakuzo_counts= Ibisakuzo::all()->where('status',1);
        $ibisakuzos = Ibisakuzo::orderBy('name','asc')->where('status',1)->paginate(200);
        return view('pages.ururimi.ibisakuzo.index')->withIbisakuzos($ibisakuzos)->withIbisakuzo_counts($ibisakuzo_counts);
    }
    public function all_ibisakuzo()
    {
        $ibisakuzos =Ibisakuzo::orderBy('name','asc')->paginate(100);
        return view('pages.ururimi.ibisakuzo.dashboard_ibisakuzo')->withIbisakuzos($ibisakuzos); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ururimi.ibisakuzo.create');
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
       'slug'  =>'required|alpha_dash|min:3|max:20|unique:ibisakuzos',
       'kice'  =>'required'
   ));
        //store in the database
        $ibisakuzo =new Ibisakuzo;
        
        $ibisakuzo->user_id = Auth::user()->id;

        $ibisakuzo ->name =$request ->name;
        $ibisakuzo ->slug =$request ->slug;
        $ibisakuzo ->kice =$request ->kice;
       
        $ibisakuzo ->save();

        Session::flash('success','Urakoze kudusangiza Igisakuzo! '.' '.$ibisakuzo->name);
        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ibisakuzo  $ibisakuzo
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $igisakuzo =Ibisakuzo::where('slug', '=',$slug) ->first(); 
       return view('pages.ururimi.ibisakuzo.show') ->withIgisakuzo($igisakuzo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ibisakuzo  $ibisakuzo
     * @return \Illuminate\Http\Response
     */
    public function edit(Ibisakuzo $ibisakuzo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ibisakuzo  $ibisakuzo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ibisakuzo $ibisakuzo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ibisakuzo  $ibisakuzo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ibisakuzo $ibisakuzo)
    {
        //
    }

    public function sakwe_sakwe_approval(Request $request)
    {
        $this ->validate($request, array(
       'igisakuzoId'  =>'required'
   )); 

    $igisakuzo =Ibisakuzo::find($request->igisakuzoId);

     $igisakuzo->status =$request->input('status');
      $igisakuzo ->save();

        Session::flash('success','Igisakuzo Approved');
        return redirect() ->back();
    }
}
