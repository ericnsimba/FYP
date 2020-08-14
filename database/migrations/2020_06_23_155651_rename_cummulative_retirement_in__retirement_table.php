<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCummulativeRetirementInRetirementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('retirement', function (Blueprint $table) {
            $table->renameColumn('cummulativeRetirement','totalAmount');
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
            $table->dropColumn('totalAmount');
        });
    }
}
