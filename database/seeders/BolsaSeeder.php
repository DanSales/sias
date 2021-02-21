<?php

namespace Database\Seeders;

use App\Models\Bolsa;
use Illuminate\Database\Seeder;

class BolsaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bolsa::factory(5)->create();
    }
}
