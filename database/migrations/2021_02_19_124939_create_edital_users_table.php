<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditalUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edital_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('edital_id');
            $table->unsignedInteger('user_id');
            $table->string('relato_familiar');
            $table->string('declaracao_rendimento');
            $table->boolean('is_beneficiario')->default(false);
            $table->boolean('is_ativo')->default(false);
            $table->foreign('edital_id')->references('id')->on('editals');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edital_users');
    }
}
