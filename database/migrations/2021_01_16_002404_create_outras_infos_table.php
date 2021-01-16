<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutrasInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outras_infos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("atividade")->nullable(false);
            $table->decimal("renda")->nullable(false);
            $table->unsignedInteger('familia_id');
            $table->foreign('familia_id')->references('id')->on('familias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outras_infos');
    }
}
