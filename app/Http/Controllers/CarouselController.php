<?php

namespace App\Http\Controllers;

use App\Carousel;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;

class CarouselController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadmin|admin|editor|author');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carouselalls = Carousel::all();
        $carousels = Carousel::orderBy('id','desc')->paginate(50);
       return view('pages.carousel.index')->withCarousels($carousels)->withCarouselalls($carouselalls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('pages.carousel.create');
    
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
        'position'  =>'required|max:10',
       'body'  =>'required|max:255'
   ));
        //store in the database
        $carousel =new Carousel;
         
         $carousel->user_id = Auth::user()->id;
         //save our image
        if($request ->hasFile('image'))
        {
            $image = $request ->file('image');
            $image->move(public_path().'/carouselimages',$image ->getClientOriginalName());
            
            $carousel->file_name =$image ->getClientOriginalName();
        }
        $carousel->position= $request->position;
        $carousel->body = $request->body;
        $carousel->save();

        return response()->json($carousel);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $carousel = Carousel::findOrFail($id);

        unlink(public_path('carouselimages/'. $carousel->file_name));
        // Storage::delete( $carousel->image);
          $carousel ->delete();
        Session::flash('success','Carousel Image Deleted!');
        return redirect() -> back();
    }

    public function carousel_approval(Request $request)
    {
        
    $this ->validate($request, array(
       'carouselId'  =>'required'
   )); 

    $carousel =Carousel::find($request->carouselId);
    
     $carousel->status =$request->input('status');
      $carousel ->save();

        Session::flash('success','Carousel Approved');
        return redirect() ->back();

    }
}
