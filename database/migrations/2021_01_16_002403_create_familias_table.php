<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome')->nullable(false);
            $table->string("cpf")->nullable(true);
            $table->date("data_nascimento")->nullable(false);
            $table->string("declaracao_autonomo")->nullable(true);
            $table->string("declaracao_agricultor")->nullable(true);
            $table->string("escolaridade")->nullable(false);
            $table->decimal("renda_mensal")->nullable(false);
            $table->string("profissao")->nullable(false);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('familias');
        Schema::dropSoftDeletes('familias');
    }
}
