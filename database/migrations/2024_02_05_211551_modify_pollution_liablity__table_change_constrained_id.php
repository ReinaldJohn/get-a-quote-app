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
        Schema::table('pollution_liability_details', function (Blueprint $table) {
            $table->dropForeign(['client_info_id']);
            $table->foreign('client_info_id')->references('id')->on('client_information')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pollution_liability_details', function (Blueprint $table) {
            $table->dropForeign(['client_info_id']);
            $table->foreign('client_info_id')->references('id')->on('commercial_auto_details')->onDelete('cascade');
        });
    }
};
