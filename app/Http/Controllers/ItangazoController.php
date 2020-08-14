<?php

namespace App\Http\Controllers;

use App\Itangazo;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;

class ItangazoController extends Controller
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
    public function index()
    {
      $itangazos = Itangazo::orderBy('id','desc')->paginate(30);
        return view('pages.amatangazo.index')->withItangazos($itangazos) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.amatangazo.create');
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
       'news_type'  =>'integer|required',
       'organisation'  =>'nullable|max:100',
       'pub_link'  =>'url|nullable|',
       'description'=>'required'
   ));



        //store in the database
        $itangazo =new Itangazo;
        
        $itangazo->user_id = Auth::user()->id;
        $itangazo ->news_type =$request ->news_type;
        $itangazo ->organisation =$request ->organisation;
        $itangazo ->pub_link =$request ->pub_link;
        $itangazo ->description =$request ->description;
        //save our image
        $itangazo ->save();
        Session::flash('success','News Saved Successfully');
       return redirect()->route('news.show', $itangazo ->id);
        //return redirect() -> back();
       //return view('pages.amatangazo.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Itangazo  $itangazo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $itangazo=Itangazo::find($id);
        return view('pages.amatangazo.show') ->withItangazo($itangazo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Itangazo  $itangazo
     * @return \Illuminate\Http\Response
     */
    public function edit(Itangazo $news)
    {
        $itangazo =Itangazo::find($news->id);
         return view('pages.amatangazo.edit') ->withItangazo($itangazo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Itangazo  $itangazo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           //validate the data
    $this ->validate($request, array(
       'news_type'  =>'integer|required',
       'parish'  =>'nullable|max:100',
       'pub_link'  =>'url|nullable|',
       'status'=>'required',
       'description'=>'required'
   )); 
      
        //save the data to the database
        $itangazo =Itangazo::find($id);

        $itangazo ->news_type =$request ->news_type;
        $itangazo ->parish =$request ->parish;
        $itangazo ->pub_link =$request ->pub_link;
        $itangazo ->description =$request ->description;
        $itangazo->status =$request->input('status');
        //save our image
       
       
        $itangazo->save();
        
         Session::flash('success','News Updated');
        //return redirect() -> route('news.index');
         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Itangazo  $itangazo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Itangazo $itangazo)
    {
        //
    }
    public function approval(Request $request)
    {
        
    $this ->validate($request, array(
       'itangazoId'  =>'required'
   )); 

    $itangazo =Itangazo::find($request->itangazoId);
    
      
     $itangazo->status =$request->input('status');
      $itangazo ->save();

        //Session::flash('success','Approved');
        return redirect() ->back();

    }
}
