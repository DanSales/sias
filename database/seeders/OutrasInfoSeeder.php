<?php

namespace Database\Seeders;

use App\Models\OutrasInfo;
use Illuminate\Database\Seeder;

class OutrasInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OutrasInfo::factory(15)->create();
    }
}
