<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImprestExpenditureandStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imprestExpenditure', function (Blueprint $table) {
            $table->unsignedBigInteger('icode');
            $table->unsignedBigInteger('excode');
            $table->foreign('icode')
                  ->references('icode')
                  ->on('imprest')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('excode')
                  ->references('excode')
                  ->on('expenditures')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->primary(['icode','excode']);
            
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imprestExpenditure');
    }
}
