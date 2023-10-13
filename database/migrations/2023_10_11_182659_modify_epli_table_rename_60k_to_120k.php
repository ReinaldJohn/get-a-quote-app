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
        Schema::table('epli_details', function (Blueprint $table) {
            $table->renameColumn('60k_to_120k', 'between_60k_to_120k');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('epli_details', function (Blueprint $table) {
            $table->renameColumn('between_60k_to_120k', '60k_to_120k');
        });
    }
};