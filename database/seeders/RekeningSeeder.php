<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('rekening')->insert([
       		[
       			'no_rekening' => '99888776655',
       			'pin' => '123456',
       			'kd_nasabah' => 'NSB9977',
       		],
       		[
       			'no_rekening' => '96968989989',
       			'pin' => '654321',
       			'kd_nasabah' => 'NSB9988',
       		],
       		[
       			'no_rekening' => '97654321987',
       			'pin' => '123455',
       			'kd_nasabah' => 'NSB9966',
       		],
       ]); 
    }
}
