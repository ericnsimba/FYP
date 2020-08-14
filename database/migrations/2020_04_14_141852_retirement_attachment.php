<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RetirementAttachment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retirementAttachment', function (Blueprint $table) {
            $table->unsignedBigInteger('rcode');
            $table->unsignedBigInteger('attachmentId');
            $table->foreign('rcode')
                  ->references('rcode')
                  ->on('retirement')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
             $table->foreign('attachmentId')
                  ->references('id')
                  ->on('attachment')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

           $table->primary(['rcode','attachmentId']);        
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retirementAttachement');
    }
}
