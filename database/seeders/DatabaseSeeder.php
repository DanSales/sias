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
            //UserSeeder::class,
            //CandidatoSeeder::class,
            //BeneficiarioSeeder::class,
            ProgramaSeeder::class,
            //AnexoSeeder::class,
            //FamiliaSeeder::class,
            //BolsaSeeder::class,
            ServidorSeeder::class,
            //OutrasInfoSeeder::class,
            //EditalUserFamiliasSeeder::class,
            //SaudeSeeder::class,
            //ContaSeeder::class,
            //EditalSeeder::class,


        ]);
    }
}
