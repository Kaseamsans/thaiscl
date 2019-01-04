<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table("comments")->insert([
        	[
        		'image_id'=> rand(0,10),
        		'name' => "test1",
        		'comment'=>  str_random(20),
          	],
        	[
        		'image_id'=> rand(0,10),
        		'name' => "test2",
        		'comment'=>  "test data",  		
        	]

        ]);
    }
}
