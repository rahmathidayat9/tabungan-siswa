<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	DB::table('users')->insert([
    		[
    			'name' => 'Rahmat Hidayatullah',
    			'username' => 'rahmat',
    			'email' => 'rahmat@example.com',
    			'password' => bcrypt('password'),
    			'level' => 'admin',
    		],
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'level' => 'admin',
            ],
            [
                'name' => 'Raka Nurfalah',
                'username' => 'raka',
                'email' => 'raka@example.com',
                'password' => bcrypt('password'),
                'level' => 'admin',
            ],
    		[
    			'name' => 'Rikka Takanashi',
    			'username' => 'rikka',
    			'email' => 'rikka@example.com',
    			'password' => bcrypt('password'),
    			'level' => 'operator',
    		],
            [
                'name' => 'Honjou Kaede',
                'username' => 'kaede',
                'email' => 'kaede@example.com',
                'password' => bcrypt('password'),
                'level' => 'operator',
            ],
    		[
    			'name' => 'Kaguya Shinomiya',
    			'username' => 'kaguya',
    			'email' => 'kaguya@example.com',
    			'password' => bcrypt('password'),
    			'level' => 'nasabah',
    		],
            [
                'name' => 'Hayasaka Ai',
                'username' => 'hayasaka',
                'email' => 'hayasaka@example.com',
                'password' => bcrypt('password'),
                'level' => 'nasabah',
            ],
    	]);
    }
}
