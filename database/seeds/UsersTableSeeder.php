<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			'role_id' => '2',
			'name' => 'Chandan Kumar',
			'email' => 'chandan.cotocus@gmail.com',
			'password' => bcrypt('chandan@1234'),
		]);
    }
}
