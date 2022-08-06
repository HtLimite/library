<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //学生表
        Schema::create('student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('account')->nullable();
            $table->char('email',18);
            $table->char('is_verification',3)->nullable();
            $table->string('verification_code',250)->nullable();
            $table->dateTime('verification_expire')->nullable();
            $table->string('password',30)->nullable();
            $table->string('avatar',70)->nullable();
            $table->integer('log')->nullable();
            $table->integer('reg')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('student');
    }
}
