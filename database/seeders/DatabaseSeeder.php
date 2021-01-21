<?php

namespace Database\Seeders;

use App\Models\Anexo;
use App\Models\Bolsa;
use App\Models\Familia;
use App\Models\OutrasInfo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ProgramaSeeder::class,
            AnexoSeeder::class,
            FamiliaSeeder::class,
            OutrasInfoSeeder::class,
            SaudeSeeder::class,
            BeneficiarioSeeder::class,
            ContaSeeder::class,
            EditalSeeder::class,
            BolsaSeeder::class,
            CandidatoSeeder::class,
            ServidorSeeder::class,

        ]);
    }
}
