<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class WebController extends Controller
{
   public function home(){
        $comment = Comment::all();
        $data=array('pagename'=>"Home", 'school'=>$comment);
        return view("index")->with($data);
    }
    public function item($id){

    }
}
