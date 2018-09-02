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
            $table->unsignedInteger('id_user');
	    $table->unsignedInteger('id_client');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_client')->references('id')->on('clientes');
            $table->date('date');
            $table->integer('situation')->default(0);
            $table->timestamps();
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
