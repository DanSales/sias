<?php

namespace Database\Seeders;

use App\Models\Saude;
use Illuminate\Database\Seeder;

class SaudeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Saude::factory(80)->create();
    }
}
