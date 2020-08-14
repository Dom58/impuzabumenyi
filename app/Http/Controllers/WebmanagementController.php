<?php

namespace App\Http\Controllers;

use App\Webmanagement;
use Illuminate\Http\Request;
use App\Department;
use Session;

class WebmanagementController extends Controller
{
     public function __construct()
    {
        $this->middleware('role:superadmin', ['except'=>['index','show'] ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs=Webmanagement::all();
        return view('pages.roles.staff.index')->withStaffs($staffs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments =Department::all();
         return view('pages.roles.staff.create')->withDepartments($departments);
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
        'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       'fullname' =>'required',
       'department_id' =>'required|integer',
       'background'  =>'required'
   ));
        //store in the database
        $staff =new Webmanagement;

        $staff ->fullname = $request ->fullname;
       // $staff ->department = $request ->department;
        $staff ->department_id =$request ->department_id;
        $staff ->background = $request ->background;
        //save our image
        if($request ->hasFile('image')){
             $image = $request ->file('image');
            
            $image->move(public_path().'/ndumukristuStaff',$image ->getClientOriginalName());
            
            $staff->file_name=$image ->getClientOriginalName();
            $staff->file_size=$image ->getClientSize();
            $staff->file_type=$image ->getClientMimeType();
            
        }
       
        $staff ->save();
        Session::flash('success','Saved');
        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Webmanagement  $webmanagement
     * @return \Illuminate\Http\Response
     */
    public function show(Webmanagement $webmanagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Webmanagement  $webmanagement
     * @return \Illuminate\Http\Response
     */
    public function edit(Webmanagement $management)
    {

        $departments =Department::all();
        $staff =Webmanagement::find($management->id);
         return view('pages.roles.staff.edit') ->withStaff($staff)->withDepartments($departments);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Webmanagement  $webmanagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $this ->validate($request, array(
        'image'=>'required',
       'fullname' =>'required',
       'department_id' =>'required|integer',
       'background'  =>'required'
 
   ));
        $staff =Webmanagement::find($id);

        $staff ->fullname = $request ->fullname;
        $staff ->department_id =$request ->department_id;
        $staff ->background = $request ->background;
        //save our image
        if($request ->hasFile('image'))
        {
             $image = $request ->file('image');
            
            $image->move(public_path().'/ndumukristuStaff',$image ->getClientOriginalName());
            
            $staff->file_name=$image->getClientOriginalName();
             $staff->file_size=$image->getClientSize();
            $staff->file_type=$image->getClientMimeType();
            
        }
       
        $staff ->save();
        Session::flash('success','Updated');
        return redirect() -> back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Webmanagement  $webmanagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Webmanagement $webmanagement)
    {
        //
    }

    public function approval(Request $request)
    {
        
    $this ->validate($request, array(
       'staffId'  =>'required'
   )); 

    $staff =Webmanagement::find($request->staffId);
    
      
     $staff->status =$request->input('status');
      $staff ->save();

        //Session::flash('success','Approved');
        return redirect() ->back();

    }
}
