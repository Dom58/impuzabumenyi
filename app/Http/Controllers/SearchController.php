<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use DB;
// use App\Ivanjiri;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         
            $post_search =$request->input('search');

            // $amasengesho =$request->input('search');

            if(empty($post_search))
            {
             $myerror='Nta Jambo na rimwe rishakishwa wanditse!!!';
            return view('pages.error.403')->withMyerror($myerror);
        }

         else
         {
            $post_searches = Post::orderBy('id','asc')->where('status',1)->where('title','like','%' .$post_search. '%')->get(); 
                    return view('pages.searches.index')->withPost_searches($post_searches)->withPost_search($post_search);

         }       
    }
}
