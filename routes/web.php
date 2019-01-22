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
});

/* ROUTES ONLY FOR BLOG MODERATORS */
Route::group(['middleware'=>'blogmoderator'],function(){
Route::get('/BlogDashboard','Admin\dashboard@blogindex');
Route::get('/blogmoderator/commentsreplies','Admin\dashboard@commentsreplies');
Route::get('/blogmoderator/statistics','Admin\dashboard@blogstatistics');
Route::get('/blogmoderator/posts','Admin\dashboard@blogposts');
});


/* ROUTES ONLY FOR MARKET MODERATORS */
Route::group(['middleware'=>'marketmoderator'],function(){
Route::get('/MarketDashboard','Admin\dashboard@marketindex');
Route::get('/marketmoderator/newcarparts','Admin\marketdashboard@newcarpartsdashboard');
Route::get('/marketmoderator/usedcarparts','Admin\marketdashboard@usedcarpartsdashboard');
Route::get('/marketmoderator/newvehicles','Admin\marketdashboard@newvehiclesdashboard');
Route::get('/marketmoderator/usedvehicles','Admin\marketdashboard@usedvehiclesdashboard');
});

/* ROUTES ONLY FOR EDITORS */

Route::group(['middleware'=>'admin'],function(){

});

/* ROUTES ONLY FOR SERVICES MODERATORS */

Route::group(['middleware'=>'servicesmoderator'],function(){
Route::get('/ServicesDashboard','Admin\dashboard@servicesindex');
Route::get('/servicesmoderator/carwashes','Admin\dashboard@carwashes');
Route::get('/servicesmoderator/workshops','Admin\dashboard@workshops');
});

/* ROUTES ONLY FOR ENCYCLOPEDIA MODERATORS */
Route::group(['middleware'=>'encyclopediamoderator'],function(){
Route::get('/EncyclopediaDashboard','Admin\dashboard@encyclopediadashboard');
Route::get('/editor/addbrand','Admin\encyclopediadashboard@addbrand');
Route::get('/editor/addgeneration','Admin\encyclopediadashboard@addgeneration');
Route::get('/editor/addmodel','Admin\encyclopediadashboard@addmodel');
Route::get('/encyclopediamoderator/articles','Admin\dashboard@articles');
});

/* Admin todolist routes */
