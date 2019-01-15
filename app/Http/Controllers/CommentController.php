<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
    //
    protected $comments;

    public function __construct(){

    	$this->comments = new Comment();
  	}
    
  	public function show(){
  		$comments = Comment::all();

  		return $comments;
  	}

	public function check_connection(){
        $comments = Comment::all();

        return $comments ? 'Model Comments Connect Success!' : 'Error! Model Comments Connect';
    }
    public function search_by_image_id($image_id){
    	
    	$data = $this->comments->search_by_image_id($image_id);

    	return $data;
    }
    public function search_by_id($id){
    	//$comments = new Comments();
    	$data = $this->comments->search_by_id($id);

    	return $data;
    }
    public function create_comment(Request $request){

    	$validate = Comment::validate($request->all());
    	if ($validate->passes()){
    		$comments = new Comment();
    		$comments->image_id = Input::get('image_id');
    		$comments->name = Input::get('name');
    		$comments->comment = Input::get('comment');
    		$comments->save();
            return "Save Success";
    	}
    	else {
    		return $validate->messages();
    	}

    }
}
