<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditUserssalarGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usersSalaryGrade', function (Blueprint $table) {
            $table->integer('from');
            $table->integer('to');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usersSalaryGrade', function (Blueprint $table) {
           $table->dropColumn('form');
           $table->dropColumn('to');
        });
    }
}
