<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cyber_liability_details', function (Blueprint $table) {
            $table->string('cyber_q1', 255)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('cyber_liability_details', function (Blueprint $table) {
        //     $table->dropColumn('cyber_q1');
        // });
    }
};