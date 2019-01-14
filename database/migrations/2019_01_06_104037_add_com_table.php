<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddComTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reg_l_course', function (Blueprint $table) {
            $table->boolean('completed')->after('accepted')->default(0);
        });

        Schema::table('reg_course', function (Blueprint $table) {
            $table->boolean('completed')->after('accepted')->default(0);
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
