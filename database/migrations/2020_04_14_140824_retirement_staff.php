<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RetirementStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retirementStaff', function (Blueprint $table) {
            $table->unsignedBigInteger('rcode');
            $table->integer('employmentNumber');
            $table->foreign('rcode')
                  ->references('rcode')
                  ->on('retirement')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
            $table->foreign('employmentNumber')
                  ->references('employmentNumber')
                  ->on('username')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->primary(['rcode','employmentNumber']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retirementStaff');
    }
}
