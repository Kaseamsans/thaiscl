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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',"WebController@home");
//comments route
//Route::get('CheckComments','CommentController@check_connection');
//Route::get('test/SearchCommentById/{id}','CommentController@search_by_id');
//Route::get('test/SearchCommentByImageId/{id}','CommentController@search_by_image_id');
//Route::post('AddComment','CommentController@create_comment');
//comments route
Route::group(['prefix'=>'comments'],function() {
	Route::get('/','CommentController@show');
	Route::get('/CheckConnection','CommentController@check_connection');
    Route::get('/{id}','CommentController@search_by_id');
    Route::get('/SearchCommentByImageId/{image_id}','CommentController@search_by_image_id');
    Route::post('/AddComment','CommentController@create_comment');
    //Route::delete('delete',function($id){
    //    return 'Delete Success';
    //});
});
//
Route::group(['prefix'=>'images'],function() {
	Route::get('/','ImageController@show');
	Route::get('/CheckConnection','ImageController@check_connection');
    Route::get('/{id}','ImageController@search_by_id');
    Route::get('/SearchImageByMenuId/{image_id}','ImageController@search_by_menu_id');
    //Route::post('/AddImage','ImagesController@add_image');
    //Route::delete('delete',function($id){
    //    return 'Delete Success';
    //});
});

Route::group(['prefix'=>'schools'],function() {
	Route::get('/','SchoolController@show');
	Route::get('/CheckConnection','SchoolController@check_connection');
    Route::get('/{id}','SchoolController@search_by_id');
    Route::get('/SearchSchoolBySchoolName/{school_name}','SchoolController@search_by_school_name');
    //Route::post('/AddSchool','ImagesController@add_school');
    //Route::delete('delete',function($id){
    //    return 'Delete Success';
    //});
});

Route::group(['prefix'=>'menus'],function() {
	Route::get('/','MenuController@show');
	Route::get('/CheckConnection','MenuController@check_connection');
    Route::get('/{id}','MenuController@search_by_id');
    Route::get('/SearchMenuByMenuName/{menu_name}','MenuController@search_by_menu_name');
    Route::get('/SearchMenuBySchoolId/{school_id}','MenuController@search_by_school_id');
    //Route::post('/AddSchool','ImagesController@add_school');
    //Route::delete('delete',function($id){
    //    return 'Delete Success';
    //});
});