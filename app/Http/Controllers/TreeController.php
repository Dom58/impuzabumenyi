<?php

namespace App\Http\Controllers;

use App\Tree;
use Illuminate\Http\Request;
use App\Treecategory;
use App\User;
use Auth;
use Session;

class TreeController extends Controller
{
     public function __construct()
    {
        $this->middleware('role:superadmin|admin|editor|author', ['except'=>['show','all_strongbigTree','all_softsmallTree','all_grass']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trashedtrees =Tree::onlyTrashed();
        $trees =Tree::orderBy('name','asc')->paginate(200);
        return view('pages.ibidukikije.ibimeraStore.index')->withTrees($trees)->withTrashedtrees($trashedtrees);
        // pages.ibidukikije.treeStore.tree.index
    }
    public function all_trashed()
    {
        $trees =Tree::onlyTrashed()->orderBy('deleted_at','desc')->paginate(200);
        return view('pages.ibidukikije.ibimeraStore.trashed_tree')->withTrees($trees);
        // pages.ibidukikije.treetore.tree.index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Treecategory::all();
        return view('pages.ibidukikije.ibimeraStore.create')->withCategories($categories);
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
       'treecategory_id' =>'required|integer|max:50',
       'slug'  =>'required|alpha_dash|min:5|max:255|unique:trees',
       'image'=>'required',
       'description'  =>'required|min:20'
   ));
        //store in the database
        $tree =new Tree;
        
        $tree->user_id = Auth::user()->id;

        $tree ->name =$request ->name;
        $tree ->treecategory_id =$request ->treecategory_id;
        $tree ->slug =$request ->slug;
        $tree ->description =$request ->description;
        
        //save our image
        if($request ->hasFile('image')){
            
             $image = $request ->file('image');
            
            $image->move(public_path().'/ibidukikije_Tree',$image ->getClientOriginalName());
            
            $tree->file_name=$image ->getClientOriginalName();
        }
       
        $tree ->save();

        Session::flash('success','Tree Saved! '.' '.$tree->name);
        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $categories= Treecategory::all();
        $tree = Tree::where('slug','=',$slug)->where('status',1)->first();
       return view('pages.ibidukikije.ibimeraStore.show') ->withTree($tree)->withCategories($categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Treecategory::all();
        $tree = Tree::find($id);
        return view('pages.ibidukikije.ibimeraStore.edit') ->withTree($tree)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $tree =Tree::find($id);
        
        if($request ->input('slug') ==$tree ->slug){
         
             $this ->validate($request, array(
       'name' =>'required|max:255',
       'description'  =>'required',
       'treecategory_id'=>'required',
       // 'image'=>'required',
       'status'  =>'required'
 
   ));
        }
        else{
         //validate the data
    $this ->validate($request, array(
       'name' =>'required|max:255',
       'slug'  =>'required|alpha_dash|min:5|max:255|unique:posts',
       'description'  =>'required',
       'treecategory_id'=>'required',
       'status'  =>'required'
       // 'image'=>'image'
   )); 
        }
        
        //save the data to the database
        $tree =Tree::find($id);
        $tree ->name =$request ->name;
        $tree ->slug =$request ->slug;
        $tree ->description =$request ->description;
        $tree->treecategory_id =$request->input('treecategory_id');
        $tree->status =$request->input('status');
       
        $tree ->save();
        
         Session::flash('success',' '.$tree->name.' '.' Updated');
        return redirect() -> back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Tree::destroy($id);

        Session::flash('success','Tree Saved to Trashed!');
        return redirect()->route('tree.index');
    }
        public function restore_tree(Request $request){
        $this ->validate($request, array(
       'trashtree_id'  =>'required',
       'deleted_at'  =>'nullable'
   )); 
        $tree = Tree::withTrashed()->find($request->trashtree_id);
         $tree ->restore();

     // $tree->deleted_at =$request->deleted_at;
      $tree ->save();

// $sms ='please Verify or <a href="'.url("/retore").'"> UNDO </a> Email';
     Session::flash('success',' '.$tree->name.' '.'Retored Successfuly!!');
        return redirect()->back();       
    }

    public function delete_tree($id){
        $tree =Tree::withTrashed()->findOrFail($id);

        unlink(public_path('/ibidukikije_tree/'.$tree->file_name));

      //delete DB record
        $tree ->forceDelete();

        Session::flash('success','Tree Deleted Permanently!!!');
        return redirect() ->back();
    }
    // +++++++++++++End+++++++++++++++++++++

     public function tree_approval(Request $request){
        $this ->validate($request, array(
       'treeId'  =>'required'
   )); 

    $tree = Tree::find($request->treeId);

     $tree->status =$request->input('status');
      $tree ->save();

        Session::flash('success','Tree '.' '.$tree->name.' '.' Approved');
        return redirect() ->back();
    }

    public function all_strongbigTree(){
        $all_strongtrees= Tree::all()->where('treecategory_id',1)->where('status',1);
        $strongtrees = Tree::orderBy('name','asc')->where('treecategory_id',1)->where('status',1)->paginate(200);
        return view('pages.ibidukikije.ibimeraStore.tree.all_strongbigTree')->withStrongtrees($strongtrees)->withAll_strongtrees($all_strongtrees);
    }

    public function all_softsmallTree(){

        $all_softtrees= Tree::all()->where('treecategory_id',2)->where('status',1);
        $strongtrees = Tree::orderBy('name','asc')->where('treecategory_id',2)->where('status',1)->paginate(200);
        return view('pages.ibidukikije.ibimeraStore.tree.all_softsmallTree')->withStrongtrees($strongtrees)->withAll_softtrees($all_softtrees);
        
    }

    public function all_grass(){

        $all_grasses= Tree::all()->where('treecategory_id',3)->where('status',1);
        $grasses = Tree::orderBy('name','asc')->where('treecategory_id',3)->where('status',1)->paginate(200);
        return view('pages.ibidukikije.ibimeraStore.tree.all_grass')->withGrasses($grasses)->withAll_grasses($all_grasses);
        
    }
}
