<?php

namespace App\Http\Controllers;

use App\Profilemanage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

use Session;
use Hash;
use Input;
use Image;
use Storage;
use File;

class ProfilemanageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view("pages.roles.users.index");
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profilemanage  $profilemanage
     * @return \Illuminate\Http\Response
     */
    public function show(User $username)
    {
      //   // $user = User::where('id', $id)->first();
         $user = User::find($username);
      return view("pages.roles.users.show")->withUser($user);
      //   // return redirect()->route('userProfile.show', $user->id)->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profilemanage  $profilemanage
     * @return \Illuminate\Http\Response
     */
    // public function edit(User $user) replace by below
    public function edit(User $name)
    {
      // $myuser = User::where($id)->first();
      //  return view("pages.roles.users.edit")->withMyuser($myuser);

        $user=Auth::user();
        return view('pages.roles.users.edit',compact('user'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profilemanage  $profilemanage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

      //$user = User::findOrFail($id);

      if(Auth::user()->tel==request('tel'))
      {
         
             $this ->validate(request(), array(
       'name' => 'required|max:255',
       'sname' => 'nullable|string|max:32',
        'username' => 'string|max:32|unique:users,username,'.Auth::user()->id,

        'email' => 'required|email|unique:users,email,'.Auth::user()->id,
        'district' => 'nullable|string|max:32',
        'sector' => 'nullable|string|max:32',
        'gender' => 'boolean',
        'profile_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        // 'password' =>'required|min:6|confirmed'
   ));

             // $user->password=bcrypt(request('password'));
          $user->name = request('name');
          $user->sname = request('sname');
          $user->username = request('username');
          $user->email = request('email');
          $user->gender = request('gender');
          $user->district = request('district');
          $user->sector = request('sector');

      // if($request ->hasFile('profile_image')){
            
      //        $profile_image = $request ->file('profile_image');
            
      //       $profile_image->move(public_path().'/userProfileImage',$profile_image ->getClientOriginalName());
            
      //       $user->profile_image=$profile_image ->getClientOriginalName();    
      //   }

          // +++++++++++++++++
        if($request ->hasFile('profile_image') && !empty(Auth::user()->profile_image))
      {

        unlink(public_path('userProfileImage/'.$user->profile_image));

        $profile_image = $request ->file('profile_image');
            
            $profile_image->move(public_path().'/userProfileImage',$profile_image ->getClientOriginalName());
            
            $user->profile_image=$profile_image ->getClientOriginalName();
      }

        elseif($request ->hasFile('profile_image') && empty(Auth::user()->profile_image))
        {    
             $profile_image = $request ->file('profile_image');
            
            $profile_image->move(public_path().'/userProfileImage',$profile_image ->getClientOriginalName());
            
            $user->profile_image=$profile_image ->getClientOriginalName();
        }
        // ++++++++++++++
          $user->save();
          Session::flash('success', 'Your Profile   Updated successfully!');      
          return redirect()->back();
        }

         else
         {

      $this->validate(request(), [
        'name' => 'required|max:255',
        'sname' => 'nullable|string|max:32',
        'username' => 'string|max:32|unique:users,username,'.Auth::user()->id,
        'email' => 'required|email|unique:users,email,'.Auth::user()->id,
        
        'tel' => 'required|unique:users|max:13|min:10',
        'gender' => 'boolean',
        'district' => 'nullable|string|max:32',
        'sector' => 'nullable|string|max:32',
        'profile_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        // 'password'=>'required|min:6|confirmed'
      ]);

      $user->name = request('name');
      $user->sname = request('sname');
      $user->username = request('username');
      $user->email = request('email');
      $user->tel = request('tel');
      $user->gender = request('gender');
      $user->district = request('district');
      $user->sector = request('sector');

    // if($request ->hasFile('profile_image')){
            
    //          $profile_image = $request ->file('profile_image');
            
    //         $profile_image->move(public_path().'/userProfileImage',$profile_image ->getClientOriginalName());
            
    //         $user->profile_image=$profile_image ->getClientOriginalName();
    //     }

        // +++++++++++++++++
        if($request ->hasFile('profile_image') && !empty(Auth::user()->profile_image))
      {

        unlink(public_path('userProfileImage/'.$user->profile_image));

        $profile_image = $request ->file('profile_image');
            
            $profile_image->move(public_path().'/userProfileImage',$profile_image ->getClientOriginalName());
            
            $user->profile_image=$profile_image ->getClientOriginalName();
      }

        elseif($request ->hasFile('profile_image') && empty(Auth::user()->profile_image))
        {    
             $profile_image = $request ->file('profile_image');
            
            $profile_image->move(public_path().'/userProfileImage',$profile_image ->getClientOriginalName());
            
            $user->profile_image=$profile_image ->getClientOriginalName();
            //  $user->file_size=$profile_image ->getClientSize();
            // $user->file_type=$profile_image ->getClientMimeType();
            
        }
        // ++++++++++++++
     
      $user->save();

      Session::flash('success', 'Your Profile Updated successfully!');     
      return redirect()->back();
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profilemanage  $profilemanage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profilemanage $profilemanage)
    {
        //
    }

     //  password checking and Editing
    Public function password_checkform(){
      return view('pages.profilepasswordcheck');
  }

  Public function passwordcheck( Request $request){

    $this->validate($request, [
            'passcheck' => 'required|string',
            'email' => 'required|email'
        ]);

    $user=Auth::user();
      
    if($user->username ==request('passcheck') && ($user->email ==request('email')) ){
        return view('pages.roles.users.edit',compact('user'));

      }

      else{
        return 'false';
      }
    }
}
