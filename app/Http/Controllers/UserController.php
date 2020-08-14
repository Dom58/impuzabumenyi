<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Session;
use Hash;
use Input;
use App\Profilemanage;
use Image;
use Storage;
use File;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::orderBy('id', 'asc')->paginate(20);
      return view('admin.manage.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::all();
      return view('admin.manage.users.create')->withRoles($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request, [
        'name' => 'required|max:255',
        'username' => 'nullable|string|max:32',
        'email' => 'required|email|unique:users',
        'gender' => 'boolean'
      ]);

      if (!empty($request->password)) {
        $password = trim($request->password);
      } else {
        # set the manual password
        $length = 10;
        $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        $password = $str;
      }

      if($request->gender == 1)
      {
        $profile_image='male.png';
      }
      else {
        $profile_image='female.png';
      }

      $user = new User();
      $user->gender = $request->input('gender');
      $user->name = $request->name;
      $user->username = $request->username;
      $user->email = $request->email;
      // $user->uparuwase = $request->uparuwase;
      // $user->profile_image = $profile_image;
      $user->password = Hash::make($password);
      // $user->confirmed = 1;
      // $user->confirmation_code = null;
      $user->save();

      if ($request->roles) {
        $user->syncRoles(explode(',', $request->roles));
      }

      // Profilemanage::create(['user_id' => $user->id ]);

      return redirect()->route('users.show', $user->id);

      // if () {
      //
      // } else {
      //   Session::flash('danger', 'Sorry a problem occurred while creating this user.');
      //   return redirect()->route('users.create');
      // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::where('id', $id)->with('roles')->first();
      return view("admin.manage.users.show")->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $roles = Role::all();
      $user = User::where('id', $id)->with('roles')->first();
      return view("admin.manage.users.edit")->withUser($user)->withRoles($roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $user = User::findOrFail($id);

      if($request ->input('tel') ==$user ->tel)
      {
         
        $this ->validate($request, array(
       'name' => 'required|max:255',
        'username' => 'nullable|string|max:32|unique:users,username,'.$id,
        'email' => 'required|email|unique:users,email,'.$id,
        'gender' => 'boolean'
 
   ));
        }

         else
         {
      $this->validate($request, [
        'name' => 'required|max:255',
        'username' => 'nullable|string|max:32|unique:users,username,'.$id,
        'email' => 'required|email|unique:users,email,'.$id,
        'gender' => 'boolean',
        'tel' => 'nullable|unique:users|max:13|min:10',
        'profile_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);

      }

      $user->name = $request->name;
      $user->username = $request->username;
      $user->email = $request->email;

      if ($request->password_options == 'auto') {
        $length = 10;
        $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        $user->password = Hash::make($str);
      } 
      elseif ($request->password_options = 'manual') {
        $user->password = Hash::make($request->password);
      }


     if($request ->hasFile('profile_image')){
            
             $profile_image = $request ->file('profile_image');
            
            $profile_image->move(public_path().'/userProfileImage',$profile_image ->getClientOriginalName());
            
            $user->profile_image=$profile_image ->getClientOriginalName();
            //  $user->file_size=$profile_image ->getClientSize();
            // $user->file_type=$profile_image ->getClientMimeType();
            
        }

      $user->gender = $request->input('gender');
        $user->tel = $request->input('tel');

      // if ($request->hasFile('profile_image')) {

      //   $default_male_image='male.png';
      //   $default_female_image='female.png';
      //   $oldFilename = $user->profile_image;
      //   if($oldFilename == $default_male_image || $oldFilename == $default_female_image)
      //   {
      //     $file = Input::file('profile_image');
      //     $name = time() . '-' . $file->getClientOriginalName();
      //     $file = $file->move(('images/users'), $name);
      //     $user->profile_image= $name;
      //   }else
      //   {
      //     $usersImage = public_path("images/users/{$user->profile_image}"); // get previous image from folder
      //     if (File::exists($usersImage)) { // unlink or remove previous image from folder
      //         unlink($usersImage);
      //     }
      //     $file = $request->file('profile_image');
      //     $name = time() . '-' . $file->getClientOriginalName();
      //     $location = public_path('images/users/' . $name);
      //     Image::make($file)->resize(200, 250)->save($location);
      //     $user->profile_image= $name;
      //   }

      // }
      $user->save();

      if($request->roles == null){
        return redirect()->route('users.show', $id);
      }
      else{
        $user->syncRoles(explode(',', $request->roles));
        return redirect()->route('users.show', $id);
      }

      Session::flash('success', 'The user was successfully updated!');
        //redirect to another page
      return redirect()->route('users.show', $user->id);


      // if () {
      //   return redirect()->route('users.show', $id);
      // } else {
      //   Session::flash('error', 'There was a problem saving the updated user info to the database. Try again later.');
      //   return redirect()->route('users.edit', $id);
      // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
