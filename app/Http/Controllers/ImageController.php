<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller {
    //
    protected $images;

    public function __construct(){

    	$this->images= new Image();
  	}
    
  	public function show(){
  		$images = Image::all();

  		return $images;
  	}

	public function check_connection(){
        $images = Image::all();

        //return $images ? 'Model Image Connect Success!' : 'Error! Model Image Connect';
        return $images ? 'Model Image Connect Success!' : 'Error! Model Image Connect';
    }
    public function search_by_menu_id($menu_id){
    	
    	$data = $this->images->search_by_menu_id($menu_id);

    	return $data;
    }
    public function search_by_id($id){
    	//$comments = new Comments();
    	$data = $this->images->search_by_id($id);

    	return $data;
    }
    /*public function create_comment(){

    	$validate = Comment::validate(Input::all());
    	if ($validate->passes()){
    		$comments = new Comment();
    		$comments->image_id = Input::get('image_id');
    		$comments->name = Input::get('name');
    		$comments->comment = Input::get('comment');
    		$comments->save();
    		return "Save Successed";
    	}
    	else {
    		return $validate->messages();
    	}

    }*/
}
