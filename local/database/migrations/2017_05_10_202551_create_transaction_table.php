<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->string('tranID', 50)->primary();
            $table->unsignedInteger('charges');
            $table->string('cardID', 20);
            $table->string('spID', 10);
            $table->string('billID', 100);
            $table->string('state', 1)->default('N'); //N: normal, R: refunded
            $table->foreign('cardID')->references('cardID')->on('card');
            $table->foreign('spID')->references('spID')->on('service_provider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
