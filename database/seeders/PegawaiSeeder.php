<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawai')->insert([
       		[
	       		  'kd_pegawai' => 'NSB9988',
	            'nm_pegawai' => 'Sunandar Opr',
	            'jk'  =>  'L',
	            'no_hp' =>  '085789987654',
	            'email' => 'sunandar@example.com',
	            'alamat' => 'Mangunreja',
            	'id_users' => '4',
       		],
        	[
            'kd_pegawai' => 'NSB9977',
            'nm_pegawai' => 'Asep Opr',
            'jk'  =>  'L',
            'no_hp' =>  '082786493827',
            'email' => 'asep@example.com',
            'alamat' => 'Singaparna',
            'id_users' => '5',
          ],
       ]);
    }
}