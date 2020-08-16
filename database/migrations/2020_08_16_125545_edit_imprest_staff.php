<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditImprestStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imprestStaff', function (Blueprint $table) {
            $table->boolean('accountingOfficerStatus')->nullable();
            $table->boolean('bursarStatus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('retirement', function (Blueprint $table) {
            Schema::dropIfExists('imprestStaff');

        });
    }
}
