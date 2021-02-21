<?php

namespace Database\Seeders;

use App\Models\Edital;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class EditalUserFamiliasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++){
            $editalUser = Factory::factoryForModel('EditalUser')->create();
            $user = User::find($editalUser->user_id);
            foreach ($user->familias as $f){
                DB::table('edital_user_familia')->insert(
                    [
                        'edital_user_id' => $editalUser->id,
                        'familia_id' => $f->id,
                    ]);
            }
        }

    }
}
