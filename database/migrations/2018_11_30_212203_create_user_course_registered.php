<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCourseRegistered extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reg_course', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('dob');
            $table->string('sex');
            $table->string('nationality');
            $table->string('phone');
            $table->string('email');
            $table->integer('user_id')->unsigned();
            $table->integer('scourse_id')->unsigned();
            $table->boolean('accepted')->default(0);
            $table->timestamps();
        });

        Schema::table('reg_course', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('reg_course', function (Blueprint $table) {
            $table->foreign('scourse_id')->references('id')->on('short_course')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reg_course');
    }
}
