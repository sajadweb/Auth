<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_client', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->uuid('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_client');
    }
}
