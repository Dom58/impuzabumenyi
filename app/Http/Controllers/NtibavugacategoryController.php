<?php

namespace App\Http\Controllers;

use App\Ntibavugacategory;
use Illuminate\Http\Request;
use Session;

class NtibavugacategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('role:superadmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $categories =Ntibavugacategory::all();
       return view('pages.ntibavuga.category.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        'name' => 'required|max:100|unique:ntibavugacategories',
        'description' => 'required|max:255'
      ));

    $category = new Ntibavugacategory();
      $category->name = $request->name;
      $category->description = $request->description;
      $category->save();

    Session::flash('success', 'Ntibavuga-Bavuga Category Created');
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ntibavugacategory  $ntibavugacategory
     * @return \Illuminate\Http\Response
     */
    public function show(Ntibavugacategory $ntibavugacategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ntibavugacategory  $ntibavugacategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Ntibavugacategory $ntibavugacategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ntibavugacategory  $ntibavugacategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ntibavugacategory $ntibavugacategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ntibavugacategory  $ntibavugacategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ntibavugacategory $ntibavugacategory)
    {
        //
    }
}
