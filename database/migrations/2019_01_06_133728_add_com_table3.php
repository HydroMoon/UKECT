<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddComTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reg_l_course', function (Blueprint $table) {
            $table->unique('lcourse_id');
        });

        Schema::table('reg_course', function (Blueprint $table) {
            $table->unique('scourse_id');
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
