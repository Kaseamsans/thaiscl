<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TmpSchool;

class SchoolController extends Controller
{
    //
    protected $schools;

    public function __construct(){

    	   $this->schools= new TmpSchool();
  	}
    
  	public function show(){
  		    $schools = TmpSchool::all();

  		    return $schools;
  	}

	public function check_connection(){
          $schools = TmpSchool::all();

          return $schools ? 'Model School Connect Success!' : 'Error! Model School Connect';
    }
    public function search_by_id($school_id){
    	
    	   $data = $this->schools->search_by_id($school_id);

    	   return $data;
    }
    public function search_by_school_name($school_name){
    	   //$comments = new Comments();
    	   $schools = strtolower($school_name);
    	   $data = $this->schools->search_by_school_name($school_name);

    	   return $data;
    }
}
