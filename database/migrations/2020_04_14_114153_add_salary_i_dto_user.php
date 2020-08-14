<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSalaryIDtoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userSalaryGrades',function(Blueprint $table){
    $table->foreignId('salaryGradeId')
          ->constrained($table='salaryGrades')
          ->onDelete('restrict')
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
        Schema::table('userSalaryGrades', function (Blueprint $table) {
            $table->dropForeign(['salaryGradeId']);
        });
    }
}
