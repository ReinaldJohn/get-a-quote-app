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
        Schema::table('installation_floater_details', function (Blueprint $table) {
            $table->string('territory_of_operation', 255)->after('client_info_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('installation_floater_details', function (Blueprint $table) {
            $table->dropColumn('territory_of_operation');
        });
    }
};