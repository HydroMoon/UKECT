<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLongCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('long_course', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cname');
            $table->string('ctype');
            $table->string ('price');
            $table->string ('teacher');
            $table->string('certificate');
            $table->text('info');
            $table->date('start');
            $table->date('finish');
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
        Schema::dropIfExists('long_course');
    }
}
