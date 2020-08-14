<?php

namespace App\Http\Controllers;

use App\Ahantunyaburanga;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Ahantunyaburangacomment;
use Session;


class AhantunyaburangaController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadmin|admin|editor|author', ['except'=>['show','index','create','comment']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ahantunyaburanga_counts= Ahantunyaburanga::all()->where('status',1);
        $ahantunyaburangas = Ahantunyaburanga::orderBy('name','asc')->where('status',1)->paginate(150);
        return view('pages.amateka.ahantunyaburanga.index')->withAhantunyaburangas($ahantunyaburangas)->withAhantunyaburanga_counts($ahantunyaburanga_counts);
    }
    public function allahantu_nyaburanga()
    {
        $ahantunyaburangas =Ahantunyaburanga::orderBy('id','desc')->paginate(100);
        return view('pages.amateka.ahantunyaburanga.dashboarduduce_nyaburanga')->withAhantunyaburangas($ahantunyaburangas); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.amateka.ahantunyaburanga.create');
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
       'name' =>'required|max:50|unique:ahantunyaburangas',
       'image'=>'required',
       'description'  =>'required'
   ));
        //store in the database
        $ahantunyaburanga =new Ahantunyaburanga;
        
        $ahantunyaburanga->user_id = Auth::user()->id;

        $ahantunyaburanga ->name =$request ->name;
        $ahantunyaburanga ->description =$request ->description;
        
        //save our image
        if($request ->hasFile('image')){
            
             $image = $request ->file('image');
            
            $image->move(public_path().'/Ahantunyaburanga',$image ->getClientOriginalName());
            
            $ahantunyaburanga->file_name=$image ->getClientOriginalName();
        }
       
        $ahantunyaburanga ->save();

        Session::flash('success','Urakoze kudusangiza Aha hantu nyaburanga! '.' '.$ahantunyaburanga->name);
        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ahantunyaburanga  $ahantunyaburanga
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $ahantunyaburanga =Ahantunyaburanga::where('name', '=',$name) ->first(); 
       return view('pages.amateka.ahantunyaburanga.show') ->withAhantunyaburanga($ahantunyaburanga);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ahantunyaburanga  $ahantunyaburanga
     * @return \Illuminate\Http\Response
     */
    public function edit(Ahantunyaburanga $ahantunyaburanga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ahantunyaburanga  $ahantunyaburanga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ahantunyaburanga $ahantunyaburanga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ahantunyaburanga  $ahantunyaburanga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ahantunyaburanga $ahantunyaburanga)
    {
        //
    }

    public function ahantu_nyaburanga_approval(Request $request)
    {
        $this ->validate($request, array(
       'ahantunyaburangaId'  =>'required'
   )); 

    $ahantunyaburanga =Ahantunyaburanga::find($request->ahantunyaburangaId);

     $ahantunyaburanga->status =$request->input('status');
      $ahantunyaburanga ->save();

        Session::flash('success','Ahantunyaburanga Approved');
        return redirect() ->back();
    }
    public function comment(Request $request)
    {
        $this ->validate($request, [
           'name' =>'required|max:40' ,
           'ahantunyaburanga_id'=>'required|integer',
            'email' =>'required|email|max:40',
            'comment'=>'required'

        ]);
        $comment = new Ahantunyaburangacomment;

         $comment ->ahantunyaburanga_id =$request->ahantunyaburanga_id;
         $comment ->name =$request->name;
         $comment ->email =$request->email;
         $comment->comment=$request->comment;
        $comment ->save();
        
         Session::flash('success','Urakoze kugira icyo uvuga kuri aha hantu Nyaburanga!!');
         return redirect()->back();
    }
}
