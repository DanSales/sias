<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("agencia")->nullable(false);
            $table->string("banco")->nullable(false);
            $table->string("codigo_banco")->nullable(false);
            $table->string("tipo_conta")->nullable(false);
            $table->string("numero_conta")->nullable(false);
            $table->boolean("ativa")->nullable(false);
            $table->unsignedInteger('beneficiario_id');
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contas');
    }
}
