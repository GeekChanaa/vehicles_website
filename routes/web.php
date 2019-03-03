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
  Route::post('/admin/createTodo','todolistController@create');
  Route::post('/admin/updateTodo','todolistController@update');
  Route::delete('/admin/deleteTodo','todolistController@delete');
  Route::delete('/deleteuser','Admin\users@delete');
  Route::post('/updateuser','Admin\users@update');
});

/* ROUTES ONLY FOR BLOG MODERATORS */
Route::group(['middleware'=>'blogmoderator'],function(){
Route::get('/BlogDashboard','Admin\dashboard@blogindex');
Route::get('/blogmoderator/statistics','Admin\blogdashboard@statistics');
Route::get('/blogmoderator/posts','Admin\blogdashboard@blogposts');
Route::get('/blogmoderator/addpost','Admin\blogdashboard@addpost');
Route::delete('/blogmoderator/deletepost','Admin\blogdashboard@deletepost');
Route::get('/blogmoderator/addsection','Admin\blogdashboard@addsection');
Route::post('/blogmoderator/createsection','sectionController@create');
Route::get('/blogmoderator/sections','Admin\blogdashboard@sections');
});


/* ROUTES ONLY FOR MARKET MODERATORS */
Route::group(['middleware'=>'marketmoderator'],function(){
Route::get('/MarketDashboard','Admin\dashboard@marketindex');
Route::get('/marketmoderator/newcarparts','Admin\marketdashboard@newcarpartsdashboard');
Route::get('/marketmoderator/usedcarparts','Admin\marketdashboard@usedcarpartsdashboard');
Route::get('/marketmoderator/newvehicles','Admin\marketdashboard@newvehiclesdashboard');
Route::get('/marketmoderator/usedvehicles','Admin\marketdashboard@usedvehiclesdashboard');
Route::get('/marketmoderator/statistics','Admin\marketdashboard@statistics');
});

/* ROUTES ONLY FOR EDITORS */

Route::group(['middleware'=>'admin'],function(){

});

/* ROUTES ONLY FOR SERVICES MODERATORS */

Route::group(['middleware'=>'servicesmoderator'],function(){
Route::get('/ServicesDashboard','Admin\dashboard@servicesindex');
Route::get('/servicesmoderator/carwashes','Admin\servicesdashboard@carwashes');
Route::get('/servicesmoderator/workshops','Admin\servicesdashboard@workshops');
Route::delete('/servicesmoderator/deleteworkshop','Admin\servicesdashboard@deleteworkshop');
Route::delete('/servicesmoderator/deletecarwash','Admin\servicesdashboard@deletecarwash');
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
Route::post('/admin/createbrand','brandsController@create');
Route::post('/admin/createmodel','vmodelsController@create');
Route::post('/admin/creategeneration','generationsController@create');
});

/* User Only Routes */

Route::get('/market/post-new-vehicle',function(){
  return view('markets.addnewvehicle');
});
Route::post('/createnewvehicle','nvaController@create');

/* Market Routes */

// Index
Route::get('/market','marketController@index');

// Used Vehicles Market
Route::get('/market/usedvehicles','marketController@usedvehicles');

// New Vehicles Market
Route::get('/market/newvehicles','marketController@newvehicles');

// Used Carpart Market
Route::get('/market/usedcarpart','marketController@usedcarpart');

// New Carpart Market
Route::get('/market/newcarpart','marketController@newcarpart');

/* ======================== Blog Routes ===================== */

// Blog Index Page
Route::get('/blog','forumController@index');

// Section Page (listing All Posts with all comments and replies)
Route::get('/blog/section','forumController@section');

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
