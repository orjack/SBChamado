<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->unsignedInteger('id_client');
            $table->unsignedInteger('id_user');
            $table->date('date');
            $table->integer('situation')->default(0);
            $table->timestamps();

            $table->foreign('id_client')->references('id')->on('clients');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
