<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saudes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal("despesa_mensal")->nullable(true);
            $table->boolean("flag_plano")->nullable(false);
            $table->boolean("flag_doenca")->nullable(false);
            $table->boolean("flag_dificuldade")->nullable(false);
            $table->boolean("flag_deficiencia")->nullable(false);
            $table->decimal("valor_plano")->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saudes');
    }
}
