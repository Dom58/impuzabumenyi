<?php

namespace App\Http\Controllers;

use App\Imyambarogakondo;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

class ImyambarogakondoController extends Controller
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
        $gakondo_counts= Imyambarogakondo::all()->where('status',1);
        $gakondos = Imyambarogakondo::orderBy('name','asc')->where('status',1)->paginate(150);
        return view('pages.gakondo.imyambaro.index')->withGakondos($gakondos)->withGakondo_counts($gakondo_counts);
    }
    public function allimyambaro()
    {
        $gakondos =Imyambarogakondo::orderBy('id','desc')->paginate(100);
        return view('pages.gakondo.imyambaro.dashboardimyambaro_gakondo')->withGakondos($gakondos); 
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.gakondo.imyambaro.create');
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
       'slug'  =>'required|alpha_dash|min:5|max:255|unique:imyambarogakondos',
       'image'=>'required',
       'description'  =>'required'
   ));
        //store in the database
        $gakondo =new Imyambarogakondo;
        
        $gakondo->user_id = Auth::user()->id;

        $gakondo ->name =$request ->name;
        $gakondo ->slug =$request ->slug;
        $gakondo ->description =$request ->description;
        
        //save our image
        if($request ->hasFile('image')){
            
             $image = $request ->file('image');
            
            $image->move(public_path().'/imyambaroGakondo',$image ->getClientOriginalName());
            
            $gakondo->file_name=$image ->getClientOriginalName();
        }
       
        $gakondo ->save();

        Session::flash('success','Urakoze kudusangiza Uyu mwambaro wa kera!! '.' '.$gakondo->name);
        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imyambarogakondo  $imyambarogakondo
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $gakondo =Imyambarogakondo::where('slug', '=',$slug) ->first(); 
       return view('pages.gakondo.imyambaro.show') ->withGakondo($gakondo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imyambarogakondo  $imyambarogakondo
     * @return \Illuminate\Http\Response
     */
    public function edit(Imyambarogakondo $imyambarogakondo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imyambarogakondo  $imyambarogakondo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imyambarogakondo $imyambarogakondo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imyambarogakondo  $imyambarogakondo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imyambarogakondo $imyambarogakondo)
    {
        //
    }
     public function imyambaro_approval(Request $request)
    {
        $this ->validate($request, array(
       'imyambaroId'  =>'required'
   )); 

    $gakondo =Imyambarogakondo::find($request->imyambaroId);

     $gakondo->status =$request->input('status');
      $gakondo ->save();

        Session::flash('success','Umwambaro Gakondo Approved');
        return redirect() ->back();
    }
}
