<?php

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

Route::get('/', function () {
    return view('index');
  });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


/* ERROR ROUTES */

Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notFound']);
Route::get('403', ['as' => '403', 'uses' => 'ErrorController@accessDenied']);


/* FORBIDDEN ROUTES */

Route::get('/onlyAdmins',function(){
  return view('onlyAdmin');
});

Route::get('/onlyBlogModerator',function(){
  return view('onlyBlogModerator');
});

Route::get('/onlyEditor',function(){
  return view('onlyEditor');
});

Route::get('/onlyEncyclopediaModerator',function(){
  return view('onlyEncyclopediaModerator');
});

Route::get('/onlyServicesModerator',function(){
  return view('onlyServicesModerator');
});

Route::get('/onlyUser',function(){
  return view('onlyUser');
});

Route::get('/blog/newpost','forumController@newpost');
Route::post('/createpost','forumController@createpost');

/* ROUTES ONLY FOR ADMINS */

Route::group(['middleware'=>'admin'],function(){
  Route::get('/Dashboard','Admin\dashboard@index');
  Route::get('/admin/usersDashboard','Admin\dashboard@users');
  Route::get('/admin/statistics','Admin\dashboard@statistics');
  Route::get('/admin/blogmoderators','Admin\dashboard@blogmoderators');
  Route::get('/admin/encyclopediamoderators','Admin\dashboard@encyclopediamoderators');
  Route::get('/admin/editors','Admin\dashboard@editors');
  // TO DO ROUTES :
  Route::post('/admin/createTodo','todolistController@create');
  Route::post('/admin/doneTodo','todolistController@done');
  Route::post('/admin/updatecontentTodo','todolistController@updatecontent');
  Route::post('/admin/undoneTodo','todolistController@undone');
  Route::delete('/admin/deleteTodo','todolistController@delete');

  Route::delete('/deleteuser','Admin\users@delete');
  Route::post('/updateuser','Admin\users@update');
  Route::post('/adduser','Admin\users@add');
});

/* ROUTES ONLY FOR BLOG MODERATORS */
Route::group(['middleware'=>'blogmoderator'],function(){
Route::get('/BlogDashboard','Admin\dashboard@blogindex');
Route::get('/blogmoderator/statistics','Admin\blogdashboard@statistics');
Route::get('/blogmoderator/posts','Admin\blogdashboard@blogposts');
Route::get('/blogmoderator/addpost','Admin\blogdashboard@addpost');
Route::post('/blogmoderator/modifypost','Admin\blogdashboard@modifypost');
Route::delete('/blogmoderator/deletepost','Admin\blogdashboard@deletepost');
Route::get('/blogmoderator/addsection','Admin\blogdashboard@addsection');
Route::post('/blogmoderator/createsection','sectionController@create');
Route::get('/blogmoderator/sections','Admin\blogdashboard@sections');
Route::delete('/blogmoderator/deletecomment','Admin\blogdashboard@deletecomment');
Route::post('/blogmoderator/modifyreply','Admin\blogdashboard@modifyreply');
Route::delete('/blogmoderator/deletereply','Admin\blogdashboard@deletereply');
});


/* ROUTES ONLY FOR MARKET MODERATORS */
Route::group(['middleware'=>'marketmoderator'],function(){
Route::get('/MarketDashboard','Admin\dashboard@marketindex');
Route::get('/marketmoderator/newcarparts','Admin\marketdashboard@newcarpartsdashboard');
Route::get('/marketmoderator/usedcarparts','Admin\marketdashboard@usedcarpartsdashboard');
Route::get('/marketmoderator/newvehicles','Admin\marketdashboard@newvehiclesdashboard');
Route::get('/marketmoderator/usedvehicles','Admin\marketdashboard@usedvehiclesdashboard');
Route::get('/marketmoderator/statistics','Admin\marketdashboard@statistics');
Route::get('/marketmoderator/createnv','Admin\marketdashboard@createnv');
Route::post('/marketmoderator/addnv','Admin\marketdashboard@addnv');
Route::delete('/marketmoderator/deletenv','Admin\marketdashboard@deletenv');
Route::post('/marketmoderator/updatenv','Admin\marketdashboard@updatenv');
Route::get('/marketmoderator/createuv','Admin\marketdashboard@createuv');
Route::post('/marketmoderator/updateuv','Admin\marketdashboard@updateuv');
Route::delete('/marketmoderator/deleteuv','Admin\marketdashboard@deleteuv');
Route::post('/marketmoderator/adduv','Admin\marketdashboard@adduv');
Route::get('/marketmoderator/createncp','Admin\marketdashboard@createncp');
Route::post('/marketmoderator/addncp','Admin\marketdashboard@addncp');
Route::post('/marketmoderator/updatencp','Admin\marketdashboard@updatencp');
Route::get('/marketmoderator/getpart/{category}','autopartController@getpart');
Route::delete('/marketmoderator/deletencp','Admin\marketdashboard@deletencp');
Route::get('/marketmoderator/createucp','Admin\marketdashboard@createucp');
Route::post('/marketmoderator/adducp','Admin\marketdashboard@adducp');
Route::post('/marketmoderator/updateucp','Admin\marketdashboard@updateucp');
Route::delete('/marketmoderator/deleteucp','Admin\marketdashboard@deleteucp');

Route::get('/ajax/getnvbyday/{date}','Admin\marketdashboard@getStatisticsOfDay_nv');
Route::get('/ajax/getuvbyday/{date}','Admin\marketdashboard@getStatisticsOfDay_uv');
Route::get('/ajax/getucpbyday/{date}','Admin\marketdashboard@getStatisticsOfDay_ucp');
Route::get('/ajax/getncpbyday/{date}','Admin\marketdashboard@getStatisticsOfDay_ncp');

});

/* ROUTES ONLY FOR EDITORS */

Route::group(['middleware'=>'admin'],function(){

});

/* ROUTES ONLY FOR SERVICES MODERATORS */

Route::group(['middleware'=>'servicesmoderator'],function(){
Route::get('/ServicesDashboard','Admin\dashboard@servicesindex');
Route::get('/servicesmoderator/carwashes','Admin\servicesdashboard@carwashes');
Route::get('/servicesmoderator/workshops','Admin\servicesdashboard@workshops');
Route::post('/servicesmoderator/updateworkshop','Admin\servicesdashboard@updateworkshop');
Route::delete('/servicesmoderator/deleteworkshop','Admin\servicesdashboard@deleteworkshop');
Route::delete('/servicesmoderator/deletecarwash','Admin\servicesdashboard@deletecarwash');
Route::post('/servicesmoderator/updatecarwash','Admin\servicesdashboard@updatecarwash');
});

/* ROUTES ONLY FOR ENCYCLOPEDIA MODERATORS */
Route::group(['middleware'=>'encyclopediamoderator'],function(){
Route::get('/EncyclopediaDashboard','Admin\dashboard@encyclopediadashboard');
Route::get('/editor/addbrand','Admin\encyclopediadashboard@addbrand');
Route::get('/editor/addgeneration','Admin\encyclopediadashboard@addgeneration');
Route::get('/editor/addmodel','Admin\encyclopediadashboard@addvmodel');
Route::get('/editor/editors','Admin\encyclopediadashboard@editors');
Route::get('/encyclopediamoderator/moderators','Admin\encyclopediadashboard@moderators');
Route::get('/encyclopediamoderator/articles','Admin\dashboard@articles');
Route::get('/encyclopediamoderator/brands','Admin\encyclopediadashboard@brands');
Route::get('/encyclopediamoderator/models','Admin\encyclopediadashboard@models');
Route::get('/encyclopediamoderator/generations','Admin\encyclopediadashboard@generations');
Route::get('/encyclopediamoderator/statistics','Admin\encyclopediadashboard@statistics');
Route::delete('/encyclopediamoderator/deletebrand','Admin\encyclopediadashboard@deletebrand');
Route::delete('/encyclopediamoderator/deletevmodel','Admin\encyclopediadashboard@deletevmodel');
Route::post('/encyclopediamoderator/modifyvmodel','Admin\encyclopediadashboard@modifyvmodel');
Route::post('/encyclopediamoderator/uploadLogo','Admin\encyclopediadashboard@uploadLogo');
Route::post('/encyclopediamoderator/modifybrand','Admin\encyclopediadashboard@modifybrand');
Route::post('/admin/createbrand','brandsController@create');
Route::post('/admin/createmodel','vmodelsController@create');
Route::post('/admin/creategeneration','generationsController@create');
// get brands of some country :
Route::get('/encyclopediamoderator/getBrands/{country}','Admin\encyclopediadashboard@getBrandsOfCountry');
});

/* User Only Routes */

Route::get('/market/post-new-vehicle',function(){
  return view('markets.addnewvehicle');
});
Route::post('/createnewvehicle','nvaController@create');

/* Market Routes */

// Index
Route::get('/market','marketController@index');
Route::get('/ajax/getvmodels/{brand}','vmodelsController@getvmodels');

// Used Vehicles Market
Route::get('/market/usedvehicles/{id}','marketController@usedvehicle');
Route::post('/market/searchuv','marketController@search_uv');

// New Vehicles Market
Route::get('/market/newvehicles/{id}','marketController@newvehicle');
Route::post('/market/searchnv','marketController@search_nv');

// Used Carpart Market
Route::get('/market/usedcarparts/{id}','marketController@usedcarpart');
Route::post('/market/searchucp','marketController@search_ucp');

// New Carpart Market
Route::get('/market/newcarparts/{id}','marketController@newcarpart');
Route::post('/market/searchncp','marketController@search_ncp');

/* ======================== Blog Routes ===================== */

// Blog Index Page
Route::get('/blog','forumController@index');

// Section Page (listing All Posts with all comments and replies)
Route::get('/blog/{section}','forumController@section');

// Post Page (listing all comments and replies of the post)
Route::get('/blog/{section}/{postid}','forumController@post');

// Create Post :
Route::get('/blog/{section}/go/new_post','forumController@new_post');
Route::post('/blog/createpost','forumController@createpost');

// Create Comment :
Route::post('/blog/createcomment','forumController@createcomment');

// Create reply :
Route::post('/blog/createreply','forumController@createreply');


/* ======================= Services Routes ======================  */

//Services Index Page
Route::get('/services','servicesController@index');

//Workshops
Route::get('/services/workshops','servicesController@workshops');

//Carwashes
Route::get('/services/carwashes','servicesController@carwashes');

//Workshop owner interface
Route::get('/services/workshops-ui','servicesController@workshop_owner_interface');

//Carwash owner interface
Route::get('/services/carwashes-ui','servicesController@carwash_owner_interface');

//New Workshop
Route::get('/services/newworkshop','servicesController@newworkshop');
Route::post('/services/createworkshop','servicesController@createworkshop');

//New Carwash
Route::get('/services/newcarwash','servicesController@newcarwash');
Route::post('/services/createcarwash','servicesController@createcarwash');

/* ====================== Encyclopedia Routes =================== */

// Encyclopedia index page
Route::get('/encyclopedia','encyclopediaController@index');

/* ====================== Other Routes =================== */
Route::get('/admin/getcities/{country_name}','countryController@getcities');

/* ====================== Localization Route ====================== */

Route::get('locale/{locale}', function ($locale) {
    \Session::put('locale', $locale);
    return redirect()->back();
});
