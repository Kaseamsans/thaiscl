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
        		'address' => "112 Thailand Science Park, Khlong Nueng, Khlong Luang District, Pathum Thani 12120",
        		'numbers'=>  rand(500,4000) ,
                'icon_path'=> 'img/logo3.png',
                'email'=> 'test_hba@nectec.or.th',
                'website'=> 'www.nectec.or.th',
                'facebook_url' => 'https://www.facebook.com/NECTEC/',
                'youtube_url'=> null,
                'twiiter_url'=> 'https://twitter.com/nectec?lang=en'
          	],
        
        ]);
    }
}
