<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserDepartmentAndDesignation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userDepartment', function (Blueprint $table) {

            $table->foreignId('depId')
                  ->constrained($table='departments')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
            
        });
        Schema::create('userDesignation', function (Blueprint $table) {
            $table->integer('employmentNumber');
            // $table->foreign('employmentNumber')
            //   ->references('employmentNumber')
            //   ->on('users')->onDelete('cascade')->onUpdate('cascade') ;  
            
            $table->foreignId('designationId')
                  ->constrained($table='departments')
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
        Schema::dropIfExists('userDepartment');
        Schema::dropIfExists('userDesignation');
    }
}
