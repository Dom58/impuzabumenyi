<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;
use App\Animalcategory;
use App\User;
use Auth;
use Session;

class AnimalController extends Controller
{
     public function __construct()
    {
        $this->middleware('role:superadmin|admin|editor|author', ['except'=>['show','all_bird','all_fish','all_insect','all_mammalia','all_reptile']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trashedanimals =Animal::onlyTrashed();
        $animals =Animal::orderBy('name','asc')->paginate(200);
        return view('pages.ibidukikije.animalStore.index')->withAnimals($animals)->withTrashedanimals($trashedanimals);
        // pages.ibidukikije.animalStore.animal.index
    }

    public function all_trashed()
    {
        $animals =Animal::onlyTrashed()->orderBy('deleted_at','desc')->paginate(200);
        return view('pages.ibidukikije.animalStore.trashed_animal')->withAnimals($animals);
        // pages.ibidukikije.animalStore.animal.index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Animalcategory::all();
        return view('pages.ibidukikije.animalStore.create')->withCategories($categories);
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
       'animalcategory_id' =>'required|integer|max:50',
       'slug'  =>'required|alpha_dash|min:5|max:255|unique:animals',
       'image'=>'required',
       'description'  =>'required|min:20'
   ));
        //store in the database
        $animal =new Animal;
        
        $animal->user_id = Auth::user()->id;

        $animal ->name =$request ->name;
        $animal ->animalcategory_id =$request ->animalcategory_id;
        $animal ->slug =$request ->slug;
        $animal ->description =$request ->description;
        
        //save our image
        if($request ->hasFile('image')){
            
             $image = $request ->file('image');
            
            $image->move(public_path().'/ibidukikije_Animal',$image ->getClientOriginalName());
            
            $animal->file_name=$image ->getClientOriginalName();
        }
       
        $animal ->save();

        Session::flash('success','Animal Saved! '.' '.$animal->name);
        return redirect() -> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $categories= Animalcategory::all();
        $animal =Animal::where('slug','=',$slug)->where('status',1)->first();
       return view('pages.ibidukikije.animalStore.show') ->withAnimal($animal)->withCategories($categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Animalcategory::all();
        $animal = Animal::find($id);
        return view('pages.ibidukikije.animalStore.edit') ->withAnimal($animal)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $animal =Animal::find($id);
        
        if($request ->input('slug') ==$animal ->slug){
         
             $this ->validate($request, array(
       'name' =>'required|max:255',
       'description'  =>'required',
       'animalcategory_id'=>'required',
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
       'animalcategory_id'=>'required',
       'status'  =>'required'
       // 'image'=>'image'
   )); 
        }
        
        //save the data to the database
        $animal =Animal::find($id);
        $animal ->name =$request ->name;
        $animal ->slug =$request ->slug;
        $animal ->description =$request ->description;
        $animal->animalcategory_id =$request->input('animalcategory_id');
        $animal->status =$request->input('status');
       
        $animal ->save();
        
         Session::flash('success',' '.$animal->name.' '.' Updated');
        return redirect() -> back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */

    //softdelete & forcedelete
    public function destroy($id)
    {
        Animal::destroy($id);

        Session::flash('success','Animal Saved to Trashed!');
        return redirect()->route('animal.index');
    }

        //restore an Animal
    public function restore_animal(Request $request){
        $this ->validate($request, array(
       'trashanimal_id'  =>'required',
       'deleted_at'  =>'nullable'
   )); 
        $animal = Animal::withTrashed()->find($request->trashanimal_id);
         $animal ->restore();

     // $animal->deleted_at =$request->deleted_at;
      $animal ->save();

// $sms ='please Verify or <a href="'.url("/retore").'"> UNDO </a> Email';
     Session::flash('success',' '.$animal->name.' '.'Retored Successful!!');
        return redirect()->back();       
    }

    public function delete_animal($id){
        $animal =Animal::withTrashed()->findOrFail($id);

        unlink(public_path('/ibidukikije_Animal/'.$animal->file_name));

      //delete DB record
        $animal ->forceDelete();

        Session::flash('success','Animal Deleted Permanently!!!');
        return redirect() ->back();
    }

    public function animal_approval(Request $request){
        $this ->validate($request, array(
       'animalId'  =>'required'
   )); 

    $animal =Animal::find($request->animalId);

     $animal->status =$request->input('status');
      $animal ->save();

        Session::flash('success','Animal '.' '.$animal->name.' '.' Approved');
        return redirect() ->back();
    }

    public function all_mammalia(){
        $all_mammalias= Animal::all()->where('animalcategory_id',1)->where('status',1);
        $mammalias = Animal::orderBy('name','asc')->where('animalcategory_id',1)->where('status',1)->paginate(200);
        return view('pages.ibidukikije.animalStore.animal.all_mamalia')->withMammalias($mammalias)->withAll_mammalias($all_mammalias);

    }

    public function all_bird(){

        $all_birds= Animal::all()->where('animalcategory_id',3)->where('status',1);
        $birds = Animal::orderBy('name','asc')->where('animalcategory_id',3)->where('status',1)->paginate(200);
        return view('pages.ibidukikije.animalStore.animal.all_bird')->withBirds($birds)->withAll_birds($all_birds);
        
    }

    public function all_fish(){

        $all_fishes= Animal::all()->where('animalcategory_id',4)->where('status',1);
        $fishes = Animal::orderBy('name','asc')->where('animalcategory_id',4)->where('status',1)->paginate(200);
        return view('pages.ibidukikije.animalStore.animal.all_fish')->withFishes($fishes)->withAll_fishes($all_fishes);
    }

    public function all_reptile(){

        $all_reptiles= Animal::all()->where('animalcategory_id',5)->where('status',1);
        $reptiles = Animal::orderBy('name','asc')->where('animalcategory_id',5)->where('status',1)->paginate(200);
        return view('pages.ibidukikije.animalStore.animal.all_reptile')->withReptiles($reptiles)->withAll_reptiles($all_reptiles);
        
    }

    public function all_insect(){

        $all_insects= Animal::all()->where('animalcategory_id',6)->where('status',1);
        $insects = Animal::orderBy('name','asc')->where('animalcategory_id',6)->where('status',1)->paginate(200);
        return view('pages.ibidukikije.animalStore.animal.all_insect')->withInsects($insects)->withAll_insects($all_insects);
    }
}
