<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\homePagesController;
use App\Itangazo;
use Auth;
use App\User;
use Session;

class ContactController extends Controller
{
     public function __construct()
    {
        $this->middleware('role:superadmin|admin', ['except'=>['index','create','store']]);
    }
    /**
    pdate','edit','show'
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Contact $contacts)
    {
       // $contacts=Contact::all();
        // return view('pages.roles.admin')->withContacts($contacts);
        // return View::make('pages.roles.admin', array('contacts' =>$contacts) );
       // return view('/pages.roles.admin', compact('contacts'));
        // return View::make("pages.roles.admin", compact('contacts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news = Itangazo::where('status',1)->orderBy('id','desc')->paginate(30);
       return view('pages.contact')->withNews($news) ;
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
       'name' =>'required|max:100',
       'email' =>'email|max:20',
       'tel' =>'required|max:15|min:10',
       'sms'  =>'required|max:300|'
  ));
        //store in the database
        $contact =new Contact;
        $contact ->name =$request ->name;
        $contact ->email =$request ->email;
        $contact ->tel =$request ->tel;
        $contact ->sms =$request ->sms;
         
        $contact ->save();
        Session::flash('success','Igitekerezo cyawe cyakiriwe !!!');
         return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact,$id)
    {
        $contact = Contact::find($id);
        $contact ->delete();
        Session::flash('success','Message Deleted!!!');
        return redirect() -> back();
    }
}
