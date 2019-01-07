<?php

use Illuminate\Database\Seeder;

class TmpSchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("tmpschools")->insert([
        	[
        		'school_name'=> "nectecschool",
        		'address' => str_random(50),
        		'numbers'=>  rand(100,2000),
          	],
        
        ]);
    }
}
