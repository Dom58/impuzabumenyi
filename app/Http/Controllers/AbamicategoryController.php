<?php

namespace App\Http\Controllers;

use App\Abamicategory;
use Illuminate\Http\Request;
use Session;

class AbamicategoryController extends Controller
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
         $categories =Abamicategory::all();
       return view('pages.amateka.abami.category.index')->withCategories($categories);
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
        'category' => 'required|max:100|unique:abamicategories',
        'description' => 'required|max:255'
      ));

    $category = new Abamicategory();
      $category->category = $request->category;
      $category->description = $request->description;
      $category->save();

    Session::flash('success', 'King category Saved');
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Abamicategory  $abamicategory
     * @return \Illuminate\Http\Response
     */
    public function show(Abamicategory $abamicategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abamicategory  $abamicategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Abamicategory $abamicategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Abamicategory  $abamicategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abamicategory $abamicategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Abamicategory  $abamicategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abamicategory $abamicategory)
    {
        //
    }
}
