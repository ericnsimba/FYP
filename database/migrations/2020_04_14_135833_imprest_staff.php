<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImprestStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imprestStaff', function (Blueprint $table) {
            $table->unsignedBigInteger('icode');
            $table->integer('employmentNumber');
            $table->foreign('icode')
                  ->references('icode')
                  ->on('imprest')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
            $table->foreign('employmentNumber')
                  ->references('employmentNumber')
                  ->on('username')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->primary(['icode','employmentNumber']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imprestStaff');
    }
}
