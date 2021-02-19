<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliaEditalUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familia_edital_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('edital_users_id');
            $table->unsignedInteger('familia_id');
            $table->foreign('edital_users_id')->references('id')->on('edital_users');
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
        Schema::dropIfExists('familia_edital_users');
    }
}
