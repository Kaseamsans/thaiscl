<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("users")->insert([
        	[
        		'name'=> 'Kaseamsan',
        		'email'=>  str_random(6).'@test.com',
        		//'password'=>'d7439d3523e0e58910dbcfb9e8edda0b5882e705f6f4143158052ff8ea5593e6'
        		'password'=> Hash::make("hbalab")
        	],
        	[
        		'name'=>  'tester',
        		'email'=>  str_random(10).'@test.com',
        		'password'=> Hash::make("testing")
        	]

        ]);
    }
}
