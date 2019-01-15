<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //attrbute of image table
        //	- image_id (increments)
        //    images_name (str)
        //    images_path (str)
        //    timestamps  (date)
        //    
        DB::table("images")->insert([
        	[
        		'image_name'=> 'food_plate',
        		'menu_id' => 1,
        		'image_path' => 'img/subject1.jpg'
        	],
        	[
        		'image_name'=> 'ต้มข่าไก่',
        		'menu_id' => 1,
        		'image_path' => 'img/subject1.3.png'
        	],
        	[
        		'image_name'=>  'หมูทอด',
        		'menu_id' => 1,
        		'image_path'=> 'img/subject1.4.png',
        	],
        	[
        		'image_name'=> 'ข้าวสวย',
        		'menu_id' => 1,
        		'image_path' => 'img/subject1.1.png'
        	],

        ]);
    }
}
