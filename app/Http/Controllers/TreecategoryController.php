<?php

namespace App\Http\Controllers;

use App\Treecategory;
use Illuminate\Http\Request;
use Session;

class TreecategoryController extends Controller
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
        $categories =Treecategory::all();
       return view('pages.ibidukikije.ibimeraStore.category.index')->withCategories($categories);
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
        'name' => 'required|max:100|unique:treecategories',
        'description' => 'required|max:255'
      ));

    $category = new Treecategory();
      $category->name = $request->name;
      $category->description = $request->description;
      $category->save();

    Session::flash('success', 'Tree category Saved');
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Treecategory  $treecategory
     * @return \Illuminate\Http\Response
     */
    public function show(Treecategory $treecategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Treecategory  $treecategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Treecategory $treecategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Treecategory  $treecategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Treecategory $treecategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Treecategory  $treecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treecategory $treecategory)
    {
        //
    }
}
