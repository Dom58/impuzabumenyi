<?php

namespace App\Http\Controllers;

use App\Ntibavuga;
use Illuminate\Http\Request;
use App\Ntibavugacategory;
use Auth;
use App\User;
use Session;

class NtibavugaController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadmin|admin|editor|author', ['except'=>['show','index','seachResult']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =Ntibavugacategory::all();
        $ntibavugas =Ntibavuga::orderBy('ntibavuga','asc')->where('status',1)->paginate(100);
        return view('pages.ntibavuga.index')->withNtibavugas($ntibavugas)->withCategories( $categories); 
    }

    public function allntibavuga()
    {
        $ntibavugas =Ntibavuga::orderBy('id','desc')->paginate(100);
        return view('pages.ntibavuga.dashboardntibavuga_bavuga')->withNtibavugas($ntibavugas); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Ntibavugacategory::all();
        return view('pages.ntibavuga.create')->withCategories($categories); 
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
       'ntibavugacategory_id' =>'integer',
       'ntibavuga'=>'required|unique:ntibavugas',
       'bavuga'  =>'required',
       'igisobanuro'  =>'nullable'
   ));
        //store in the database
        $ntibavuga =new Ntibavuga;
        
        $ntibavuga->user_id = Auth::user()->id;
        $ntibavuga ->ntibavugacategory_id =$request ->ntibavugacategory_id;
        $ntibavuga ->ntibavuga =$request ->ntibavuga;
        $ntibavuga ->bavuga =$request ->bavuga;
        $ntibavuga ->igisobanuro =$request ->igisobanuro;

        $ntibavuga ->save();
        
        $ntibavugas =Ntibavuga::orderBy('id','desc')->paginate(100);
        Session::flash('success','Urakoze kudusangiza igitekerezo!');

        return redirect()->back();
        // return view('pages.ntibavuga.dashboardntibavuga_bavuga')->withNtibavugas($ntibavugas);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ntibavuga  $ntibavuga
     * @return \Illuminate\Http\Response
     */
    public function show(Ntibavuga $ntibavuga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ntibavuga  $ntibavuga
     * @return \Illuminate\Http\Response
     */
    public function edit(Ntibavuga $ntibavuga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ntibavuga  $ntibavuga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ntibavuga $ntibavuga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ntibavuga  $ntibavuga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ntibavuga $ntibavuga)
    {
        //
    }

    public function ntibavuga_approval(Request $request)
    {
        $this ->validate($request, array(
       'ntibavugaId'  =>'required'
   )); 

    $ntibavuga =Ntibavuga::find($request->ntibavugaId);

     $ntibavuga->status =$request->input('status');
      $ntibavuga ->save();

        Session::flash('success','Ntibavuga Bavuga Approved');
        return redirect() ->back();
    }

    public function seachResult( Request $request){
        $categories =Ntibavugacategory::all();

        $ntibavuga_search =$request->input('search');

            // $amasengesho =$request->input('search');

            if(empty($ntibavuga_search))
            {
             $myerror='Nta Jambo na rimwe rishakishwa wanditse!!!';
            return view('pages.error.403')->withMyerror($myerror);
        }

         else
         {
            $ntibavuga_searches = Ntibavuga::orderBy('ntibavuga','asc')->where('status',1)->where('ntibavugacategory_id','like','%' .$ntibavuga_search. '%')->get(); 
                    return view('pages.ntibavuga.search')->withNtibavuga_searches($ntibavuga_searches)->withNtibavuga_search($ntibavuga_search)->withCategories($categories);
        } 

    }
}
