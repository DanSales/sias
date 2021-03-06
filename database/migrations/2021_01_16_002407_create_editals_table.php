<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date("data_edital")->nullable(false);
            $table->string("numero_edital")->nullable(false);
            $table->string("arquivo_edital")->nullable(false);
            $table->date('inicio_inscricao')->nullable(false);
            $table->date('fim_inscricao')->nullable(false);
            $table->unsignedInteger('programa_id');
            $table->foreign('programa_id')->references('id')->on('programas');
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('editals');
        Schema::dropSoftDeletes('editals');
    }
}
