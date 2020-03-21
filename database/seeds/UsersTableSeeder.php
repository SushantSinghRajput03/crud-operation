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
         DB::table('users')->insert([
             'role_id' => '1',
             'name' => 'Admin',         
             'email' => 'admin@blog.com',
             'password' => bcrypt('rootadmin'),
         ]);
         
          DB::table('users')->insert([
        'role_id' => '2',
        'name' => 'User',     
        'email' => 'user@blog.com',
        'password' => bcrypt('rootuser'),
    ]);
}
}
