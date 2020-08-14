<?php

use App\Post;
use App\Contact;
use App\Search;
use App\Pub;
use App\Itangazo;

use App\Carousel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::group(['middleware' => ['web']], function (){
    
Route::get('/', function () {
     $posts = Post::where('status',1)->orderBy('id','desc') ->paginate(12);

      $carousels = Carousel::where('status',1)->where('position','slide')->orderBy('id','desc') ->paginate(5);
      $actives = Carousel::where('status',1)->where('position','active')->orderBy('id','desc') ->paginate(1);

      
       $pubs=Pub::where('status',1)->orderBy('id','desc')->paginate(10);

       $news = Itangazo::where('status',1)->orderBy('id','desc')->paginate(5);
      
    return view('/welcome')->withPosts($posts)->withPubs($pubs)->withNews($news)->withCarousels($carousels)->withActives($actives);
});

// ++++++++++++Vote User's Prayers++++++++++
Route::prefix('announcement')->group(function(){
Route::get('/news','homePagesController@getNews');
});


Route::resource('posts','PostController');
//1 chat
Route::prefix('chat/forum')->group(function(){
Route::resource('tuganire','ChatController');
Route::post('chatcomment','ChatController@chat_comment');
// Route::get('chatcomment','ChatController@managerchat');
// Route::post('chat_approval','ChatController@chat_approval');
// Route::get('chatcomment_statistic','ChatController@chatcomment_statistic');
});
//2 chat
Route::prefix('chat/forum')->middleware('role:superadmin|admin|editor')->group(function(){
Route::get('chatcomment','ChatController@managerchat');
Route::post('chat_approval','ChatController@chat_approval');
Route::get('chatcomment_statistic','ChatController@chatcomment_statistic');

Route::get('trashed_chats','ChatController@all_trashed');
Route::post('restorechat','ChatController@restore_chat');
Route::DELETE('/deletechat/{id}','ChatController@delete_chat');

Route::DELETE('/deletechatcomment/{id}','ChatController@chatcomment_delete');
Route::post('comment-approve','ChatController@chatcomment_approval');
});

Route::resource('mycontact','ContactController',['except' =>['update','edit','show']]);

Route::prefix('theAuthorities')->group(function(){
Route::resource('management','WebmanagementController');
Route::post('/toggle-approve','WebmanagementController@approval');
});

Route::group(['middleware' => ['auth'] ], function (){
  
Route::get('userProfile/{user}',['as'=>'userProfile.edit','uses'=>'ProfilemanageController@edit']);
Route::patch('userProfile/{user}/update',['as'=>'userProfile.update','uses'=>'ProfilemanageController@update']);

Route::get('profile/myProfile','homePagesController@getProfile');
Route::get('welcome/page','homePagesController@getWelcome');

////////////User 
// UserProfile Editing Form checking
Route::get('passwordcheck','ProfilemanageController@password_checkform');
Route::post('password_checked','ProfilemanageController@passwordcheck');
});

Route::resource('searchResult','SearchController',['except' =>['update','edit','show','destroy','create','store']
]);

Route::prefix('ikiciro')->middleware('role:superadmin')->group(function(){
Route::resource('/category','CategoryController',['except'=>['create'] ]);
Route::resource('/department','DepartmentController',['except'=>['create'] ]);
Route::resource('/animalcategory','AnimalcategoryController',['except'=>['create'] ]);
Route::resource('/treecategory','TreecategoryController',['except'=>['create'] ]);
});

Route::middleware('role:superadmin|admin|author|editor')->group(function(){
Route::get('mastrAdmin/admin/dashboard','homePagesController@getAdminPanel');
});

Route::prefix('manage')->group(function(){
 Route::resource('/pubs','PubController');
 Route::post('/pubApprove','PubController@approval');
 Route::resource('/news','ItangazoController');
 Route::post('/itangazoApprove','ItangazoController@approval');
});
//Gallery coding
Route::prefix('gallery')->group(function(){
Route::resource('gallery','GalleryController');
Route::resource('gallerycategory','GallerycategoryController',['except'=>['create'] ]);
Route::post('toggle-approve','GalleryController@approve_photo');
Route::post('photo-comment','GalleryController@imageComment');
Route::post('commentReply','GalleryController@photoReply');
});
//approval Gallery comments and Replies
Route::prefix('gallery')->middleware('role:superadmin|admin|editor')->group(function(){
Route::get('gallery_statistic','GalleryController@gallery_dashboard');
Route::post('comment-approve','GalleryController@approve_comment');
Route::post('reply-approve','GalleryController@approve_reply');

// Comment and Replying  deleting
 Route::DELETE('/destroycomment/{id}','GalleryController@destroycomment');
 Route::DELETE('/destroyreply/{id}','GalleryController@destroyreply');
});
Route::prefix('gallery')->middleware('role:superadmin|admin|editor|author')->group(function(){
  Route::get('images','GalleryController@allgallery');
  });



Route::prefix('manage')->middleware('role:superadmin|admin')->group(function(){
	Route::resource('/users','UserController');
	Route::resource('/roles','RoleController',['except'=>['destroy']
	]);
	Route::resource('/permissions','PermissionController',['except'=>['destroy']
	]);
});


Route::prefix('manage')->middleware('role:superadmin|admin|editor|author')->group(function(){
Route::get('/maindashboard','homePagesController@maindashboard');
Route::resource('/carousels','CarouselController');
Route::post('/carousel_approval','CarouselController@carousel_approval');
});

// ++++++++++++++++++++Comments and Replies+++++++++++++++++++++
Route::post('/storyComment','PostController@storyComment');
Route::post('/storyReply','PostController@storyReply');


Route::prefix('story')->middleware('role:superadmin|admin|editor')->group(function(){
 Route::post('/comment-approve','PostController@comment_approval');
 Route::post('/reply-approve','PostController@reply_approval');
 // Comment and Replying  deleting
 Route::DELETE('/destroyreply/{id}','PostController@destroyreply');
 Route::DELETE('/storydestroy/{id}','PostController@destroycomment');
 
});

//Ntibavuga Bavuga coding
Route::prefix('ntibavuga/bavuga')->group(function(){
Route::resource('ntibavuga','NtibavugaController');
Route::get('allntibavuga','NtibavugaController@allntibavuga');
Route::post('postntibavuga','NtibavugaController@ntibavuga_approval');
Route::get('seachResult','NtibavugaController@seachResult');
Route::resource('ntibavugacategory','NtibavugacategoryController',['except'=>['create'] ]);
});

Route::prefix('gakondo/all')->group(function(){
Route::resource('ibikoresho','IbikoreshogakondoController');
Route::get('ibikoresho_gakondo','IbikoreshogakondoController@allibikoresho');
Route::post('approve_ibikoresho','IbikoreshogakondoController@ibikoresho_approval');
});

Route::prefix('gakondo/all')->group(function(){
Route::resource('imyambaro','ImyambarogakondoController');
Route::get('imyambaro_gakondo','ImyambarogakondoController@allimyambaro');
Route::post('approve_imyambaro','ImyambarogakondoController@imyambaro_approval');
});

Route::prefix('amateka/all')->group(function(){
Route::resource('ahantu_nyaburanga','AhantunyaburangaController');
Route::get('uduce_nyaburanga','AhantunyaburangaController@allahantu_nyaburanga');
Route::post('approve_ahantunyaburanga','AhantunyaburangaController@ahantu_nyaburanga_approval');
Route::post('ahantunyaburanga_comment','AhantunyaburangaController@comment');
//abami
Route::resource('king_categories','AbamicategoryController');
Route::resource('abami','AbamiController');
Route::get('all_kings','AbamiController@all_kings');
Route::post('approve_king','AbamiController@king_approval');

Route::resource('insigamigani','InsigamiganiController');
Route::get('insigamigani_zose','InsigamiganiController@all_insigamigani');
Route::post('approve_insigamigani','InsigamiganiController@approve_insigamigani');
});

// ururimi routes keeping
Route::prefix('ururimi/all')->group(function(){
Route::resource('ibisakuzo','IbisakuzoController');
Route::get('sakwe_sakwe','IbisakuzoController@all_ibisakuzo');
Route::post('approve_sakwe_sakwe','IbisakuzoController@sakwe_sakwe_approval');
// Route::post('ahantunyaburanga_comment','AhantunyaburangaController@comment');
});

Route::prefix('ururimi/all')->group(function(){
Route::resource('imigani_miremire','ImiganimiremireController');
Route::get('imigani_yose','ImiganimiremireController@all_imigani');
Route::post('approve_imiganimire','ImiganimiremireController@imiganimire_approval');
// Route::post('ahantunyaburanga_comment','AhantunyaburangaController@comment');
});
Route::prefix('ururimi/all')->group(function(){
Route::resource('imigani_migufi','ImiganimigufiController');
Route::get('imiganimigu_yose','ImiganimigufiController@all_imiganimigu');
Route::post('approve_imiganimigu','ImiganimigufiController@imiganimigu_approval');
// Route::post('ahantunyaburanga_comment','AhantunyaburangaController@comment');
});

Route::prefix('animal/all')->group(function(){
Route::resource('animal','AnimalController');

Route::get('all_mammalia','AnimalController@all_mammalia');
Route::get('all_birds','AnimalController@all_bird');
Route::get('all_fishes','AnimalController@all_fish');
Route::get('all_insects','AnimalController@all_insect');
Route::get('all_reptiles','AnimalController@all_reptile');
Route::post('approve_animal','AnimalController@animal_approval');

Route::get('trashed_animals','AnimalController@all_trashed');
Route::post('restoreanimal','AnimalController@restore_animal');
Route::DELETE('/deleteanimal/{id}','AnimalController@delete_animal');
});

Route::prefix('tree/all')->group(function(){
Route::resource('tree','TreeController');

Route::get('all_bigTrees','TreeController@all_strongbigTree');
Route::get('all_smallTrees','TreeController@all_softsmallTree');
Route::get('all_grasses','TreeController@all_grass');
Route::post('approve_tree','TreeController@tree_approval');

Route::get('trashed_trees','TreeController@all_trashed');
Route::post('restoretree','TreeController@restore_tree');
Route::DELETE('/deletetree/{id}','TreeController@delete_tree');
});

Route::prefix('all/rwandan')->group(function(){
Route::resource('parks','ParkController');
Route::get('all_biggest_parks','ParkController@all_bigPark');
Route::post('approve_park','ParkController@park_approval');

Route::resource('museums','MuseumController');
Route::get('all_museums','MuseumController@all_museum');
Route::post('approve_museum','MuseumController@museum_approval');
});
Auth::routes();
