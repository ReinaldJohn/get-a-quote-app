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
        Schema::table('excess_liability_details', function (Blueprint $table) {
            $table->renameColumn('excess_amount_of_loan', 'excess_amount_of_claim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('excess_liability_details', function (Blueprint $table) {
            $table->renameColumn('excess_amount_of_claim', 'excess_amount_of_loan');
        });
    }
};