<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Retirement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retirement', function (Blueprint $table) {
            $table->id('rcode');
            $table->unsignedBigInteger('icode');
            
            $table->foreign('icode')
                  ->references('icode')
                  ->on('imprest')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retirement');
    }
}
