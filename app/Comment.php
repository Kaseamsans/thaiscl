<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Comment extends Model{
	public $timestamps = true;
    public $table = 'comments';

	public static function validate($input) {
 
 		$rules = array(
 				'name' => 'Required|Unique:comments',
 				'comment' => 'Required'
 				);
 
 		$message = array(
 				'name.required' => 'Plase insert your name'
				//address.min' => 'กรุณาป้อนที่อยู่อย่างน้อย 18 ตัวอักษรด้วยครับ',
 				//'confirmed' => 'รหัสผ่านไม่ตรงกัน'
 				);
 
 		return Validator::make($input, $rules, $message);
	}

    public function insert(array $values)
    {
        return parent::insert($values); // TODO: Change the autogenerated stub
    }
    public function search_by_id($id){
        //$data = Comments::where('comments',$id)->get();
        $data = DB::table('comments')->where('id', $id)->get();

        return $data;
    }
    public function search_by_image_id($image_id){
    	$data = DB::table('comments')->where('image_id', $image_id)->get();

    	return $data;
    }
    //public function 
}
