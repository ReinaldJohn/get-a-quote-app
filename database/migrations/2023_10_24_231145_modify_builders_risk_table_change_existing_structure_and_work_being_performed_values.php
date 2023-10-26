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
            $table->decimal('value_of_existing_structure', 10, 2)->change();
            $table->decimal('value_of_work_being_performed', 10, 2)->change();
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
            $table->decimal('value_of_existing_structure', 8, 2)->change();
            $table->decimal('value_of_work_being_performed', 8, 2)->change();
        });
    }
};