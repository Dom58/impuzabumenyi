<?php

namespace App\Http\Controllers;

use App\Animalcategory;
use Illuminate\Http\Request;
use Session;

class AnimalcategoryController extends Controller
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
        $categories =Animalcategory::all();
       return view('pages.ibidukikije.animalStore.category.index')->withCategories($categories);
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
        'name' => 'required|max:100|unique:animalcategories',
        'description' => 'required|max:255'
      ));

    $category = new Animalcategory();
      $category->name = $request->name;
      $category->description = $request->description;
      $category->save();

    Session::flash('success', 'Animal category Saved');
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animalcategory  $animalcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Animalcategory $animalcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Animalcategory  $animalcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Animalcategory $animalcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animalcategory  $animalcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animalcategory $animalcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animalcategory  $animalcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animalcategory $animalcategory)
    {
        //
    }
}
