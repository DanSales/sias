<?php

namespace Database\Seeders;

use App\Models\Anexo;
use Illuminate\Database\Seeder;

class AnexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Anexo::factory(60)->create();
    }
}
