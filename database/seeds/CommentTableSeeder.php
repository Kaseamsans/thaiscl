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
        		'image_id'=> 1,
        		'name' => str_random(4),
        		'comment'=>  str_random(100),
          	],
        	[
        		'image_id'=> 1,
        		'name' => str_random(4),
        		'comment'=>  str_random(100),  		
        	],
            [
                'image_id'=> 2,
                'name' => str_random(4),
                'comment'=>  str_random(100),       
            ],
            [
                'image_id'=> 2,
                'name' => str_random(4),
                'comment'=>  str_random(100),       
            ]

        ]);
    }
}
