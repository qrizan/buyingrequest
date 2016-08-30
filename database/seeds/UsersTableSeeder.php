<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// sample buyer
		App\User::create([
		'email' => 'buyer@mailku.com',
		'password' => bcrypt('rahasia'),
		'role' => 'buyer'
		]);

		// sample seller
		App\User::create([
		'email' => 'seller@mailku.com',
		'password' => bcrypt('rahasia'),
		'role' => 'seller'
		]);
    }
}
