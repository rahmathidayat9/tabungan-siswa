<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\UserSeeder;
use Database\Seeders\NasabahSeeder;
use Database\Seeders\PegawaiSeeder;
use Database\Seeders\RekeningSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    	$this->call(UserSeeder::class);
        $this->call(NasabahSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(RekeningSeeder::class);
    }
}
