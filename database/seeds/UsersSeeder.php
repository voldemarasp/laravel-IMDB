<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->insert([
        	'name' => 'voldemaras',
        	'email' => 'voldemarasp@gmail.com',
        	'password' => 'test',
        	'role' => 'admin'
        ]);
    }
}
