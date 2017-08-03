<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	$limit = 20;

    	for ($i = 0; $i < $limit; $i++) {
        	DB::table('users')->insert([
        		'name' => $faker->name,
        		'email' => $faker->unique()->email,
        		'password' => bcrypt('secret'),
        		'role' => 'New',
        		'ustatus_id' => 2,
        		]);
        }
    }
}
