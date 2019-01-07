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
        		'image_path' => 'img\subject1.png'
        	],
        	[
        		'image_name'=> 'tom_kha_gai',
        		'menu_id' => 1,
        		'image_path' => 'img\subject1.3.png'
        	],
        	[
        		'image_name'=>  'fried pork',
        		'menu_id' => 1,
        		'image_path'=> 'img\subject1.4.png',
        	],
        	[
        		'image_name'=> 'rice',
        		'menu_id' => 1,
        		'image_path' => 'img\subject1.1.png'
        	],

        ]);
    }
}
