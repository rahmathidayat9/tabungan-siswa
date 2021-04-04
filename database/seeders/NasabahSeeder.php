<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class NasabahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('nasabah')->insert([
       		[
       			'kd_nasabah' => 'NSB9988',
            'nm_nasabah' => 'Arjuna Nsb',
            'jk'  =>  'L',
            'no_hp' =>  '085789987654',
            'email' => 'arjuna@example.com',
            'alamat' => 'Mangunreja',
            'id_users' => '6',
       		],
          [
            'kd_nasabah' => 'NSB9977',
            'nm_nasabah' => 'Erik Nsb',
            'jk'  =>  'L',
            'no_hp' =>  '082786493827',
            'email' => 'erik@example.com',
            'alamat' => 'Singaparna',
            'id_users' => '7',
          ],
          [
            'kd_nasabah' => 'NSB9966',
            'nm_nasabah' => 'Rian Nsb',
            'jk'  =>  'L',
            'no_hp' =>  '0829087654327',
            'email' => 'rian@example.com',
            'alamat' => 'Cipasung',
            'id_users' => '8',
          ],
       ]); 
    }
}
