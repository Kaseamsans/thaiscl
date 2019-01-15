<?php

namespace App\Http\Controllers;

//use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;

class WebController extends Controller
{
   public function home(){
        $menu_controller = new MenuController();
        $image_controller = new ImageController(); 
        $menus = $menu_controller->show();
        $images = $image_controller->show();
        $data=array('pagename'=>"Home", 'menus'=>$menus , 'images'=>$images);
        return view("index2")->with($data);
    }
    public function item($id){
    	$menu_controller = new MenuController();
        $image_controller = new ImageController();
        $school_controller = new SchoolController();
        

        $menus = $menu_controller->search_by_id($id);
        $images = $image_controller->search_by_menu_id($id);
        $schools = $school_controller->search_by_id($menus[0]["school_id"]);
        $other_menus = $menu_controller->show();
        $other_images = $image_controller->show();
        $menu_name = $menus[0]["menu_name"];
        $menu_date = $menus[0]["created_at"];
        /**$menu = [   'menu_id'=> $menus[0]["menu_id"],
                    'menu_name'=> $menus[0]["menu_name"],
                    'calorie'=>  $menus[0]["calorie"],
                    'description'=> $menus[0]["description"],
                    'school_name'=> $schools[0]["school_name"],
                    'created_at'=> $menus[0]['created_at']
                ];**/
        $data=array('pagename'=>"item ".$menu_name, 'menu'=>$menus , 'images'=>$images , 'schools'=>$schools,'other_menus'=> $other_menus,'other_images'=>$other_images);
    	return view("item")->with($data) ;
    }
    public function comment($menu_id,$image_id){
    	//return $menu_id." ".$image_id ;
        $menu_controller = new MenuController();
        $image_controller = new ImageController();
        $comment_controller = new CommentController();

        $images = $image_controller->search_by_id($image_id);
        $comments = $comment_controller->search_by_image_id($image_id);
        $other_menus = $menu_controller->show();
        $other_images = $image_controller->show();

        $data=array('pagename'=>"comment ".$images[0]["image_id"], 'images'=>$images,'menu_id' => $menu_id,'comments'=>$comments , 'other_menus'=> $other_menus,'other_images'=>$other_images);
        return view("comment")->with($data);
    }
    public function add_comment($menu_id,$image_id,Request $request){
        $comment_controller = new CommentController();
        $message = $comment_controller->create_comment($request);
        
        if ('Save Success' == $message){
            return Redirect::to(url('item/'.$menu_id."/comment/".$image_id));
        }
        else {
            return Redirect::to(url('item/'.$menu_id."/comment/".$image_id))->withErrors($message);
        }
        
    }
}
