<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name', 20);
            $table->char('reserve', 10)->nullable();
            $table->char('status', 10);
            $table->dateTime('beginTime')->nullable();
            $table->dateTime('endTime')->nullable();
            $table->char('student', 18)->nullable();

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
        Schema::dropIfExists('seat');
    }
}
