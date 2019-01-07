<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TmpMenus;

class MenuController extends Controller
{
    protected $menus;

    public function __construct(){

    	$this->menus= new TmpMenus();
  	}
    
  	public function show(){
  		$menus = TmpMenus::all();

  		return $menus;
  	}

	public function check_connection(){
        $menus = TmpMenus::all();

        //return $images ? 'Model Image Connect Success!' : 'Error! Model Image Connect';
        return $menus ? 'Model Menus Connect Success!' : 'Error! Model Menus Connect';
    }
    public function search_by_id($menus_id){
    	
    	$data = $this->menus->search_by_id($menus_id);

    	return $data;
    }
    public function search_by_school_id($school_id){
    	
    	$data = $this->menus->search_by_id($menus_id);

    	return $data;
    }
    public function search_by_menus_name($menus_name){
    	//$comments = new Comments();
    	$schools = strtolower($menus_name);
    	$data = $this->menus->search_by_menus_name($menus_name);

    	return $data;
    }
}
