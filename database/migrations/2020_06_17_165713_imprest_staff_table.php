<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImprestStaffTable extends Migration
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
            $table->integer('employmentNumber')->unsigned()->index();
            $table->integer('amount_retired')->nullable();
            $table->boolean('cleared');

            $table->foreign('icode')
            ->references('icode')
            ->on('imprest')
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
        Schema::dropIfExists('imprestStaff');
    }
}
