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
    return view('welcome');
});
//comments route
//Route::get('CheckComments','CommentController@check_connection');
//Route::get('test/SearchCommentById/{id}','CommentController@search_by_id');
//Route::get('test/SearchCommentByImageId/{id}','CommentController@search_by_image_id');
//Route::post('AddComment','CommentController@create_comment');

Route::group(['prefix'=>'comments'],function() {
	Route::get('/','CommentController@show');
	Route::get('/CheckComments','CommentController@check_connection');
    Route::get('/{id}','CommentController@search_by_id');
    Route::get('/SearchCommentByImageId/{image_id}','CommentController@search_by_image_id');
    Route::post('/AddComment','CommentController@create_comment');
    //Route::delete('delete',function($id){
    //    return 'Delete Success';
    //});
});