<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserSalaryGradestable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userSalaryGrades',function(Blueprint $table){
        $table->integer('employmentNumber');
        // $table->foreign('employmentNumber')
        //       ->references('employmentNumber')
        //       ->on('username')->onDelete('cascade')->onUpdate('cascade') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userSalaryGrades');
    }
}
