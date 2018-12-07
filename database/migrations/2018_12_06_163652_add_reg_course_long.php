<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegCourseLong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reg_l_course', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('dob');
            $table->string('sex');
            $table->string('nationality');
            $table->string('phone');
            $table->string('email');
            $table->integer('user_id')->unsigned();
            $table->integer('lcourse_id')->unsigned();
            $table->boolean('accepted')->default(0);
            $table->timestamps();
        });

        Schema::table('reg_l_course', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('reg_l_course', function (Blueprint $table) {
            $table->foreign('lcourse_id')->references('id')->on('long_course')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reg_l_course', function (Blueprint $table) {
            //
        });
    }
}
