<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course_name', 50);
            $table->string('teacher');
            $table->integer('teacher_id')->unsigned();
            $table->tinyInteger('semester');
            $table->integer('spec_id')->unsigned();
            $table->timestamps();
        });

        //FK
        //Same thing as the above
        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('spec_id')
            ->references('id')
            ->on('specialties')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('teacher_id')
            ->references('id')
            ->on('admins')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
