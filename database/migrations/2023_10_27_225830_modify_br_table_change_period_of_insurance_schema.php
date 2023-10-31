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
        Schema::table('builders_risk_details', function (Blueprint $table) {
            $table->string('period_of_insurance_or_duration_of_project', 255)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('builders_risk_details', function (Blueprint $table) {
            $table->tinyInteger('period_of_insurance_or_duration_of_project')->change();
        });
    }
};