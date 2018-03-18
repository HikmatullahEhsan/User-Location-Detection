<?php

use Illuminate\Database\Seeder;
// use DB;
use Illuminate\Database\Eloquent\Model;
class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0; $i<100; $i++){
        	 DB::table('events')->insert([
	            'title' => str_random(10),
	            'desc'  => str_random(10).'@gmail.com',
	            'type'  => str_random(10),
	            'event_date'  => str_random(10),
	            'lang'  => str_random(10)
	        ]);
        }

        for($i=0; $i<100; $i++){
        	 DB::table('news')->insert([
	            'title' => str_random(10),
	            'desc'  => str_random(10).'@gmail.com',
	            'type'  => str_random(10),
	            'news_date'  => str_random(10),
	            'lang'  => str_random(10)
	        ]);
        }
       

    }
}
