<?php

use Illuminate\Database\Seeder;

class TmpMenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("tmpmenus")->insert([
        	[
        		'menu_name'=> "อาหารกลางวัน",
        		'school_id' => 1,
        		'calorie'=>  rand(100,2000),
                'star'=> rand(1,5),
                'description'=> str_random(100),
            ],
        
        ]);
    }
}
