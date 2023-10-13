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
        Schema::table('business_owners_policy_details', function (Blueprint $table) {
            $table->string('automatic_burglar_alarm', 255)->after('automatic_commercial_cooking_extinguish_system');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_owners_policy_details', function (Blueprint $table) {
            $table->dropColumn('automatic_burglar_alarm');
        });
    }
};