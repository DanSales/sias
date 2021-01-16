<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBolsasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bolsas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date("data_pagamento")->nullable(false);
            $table->unsignedInteger('conta_id');
            $table->foreign('conta_id')->references('id')->on('contas');
            $table->unsignedInteger('programa_id');
            $table->foreign('programa_id')->references('id')->on('programas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bolsas');
    }
}
