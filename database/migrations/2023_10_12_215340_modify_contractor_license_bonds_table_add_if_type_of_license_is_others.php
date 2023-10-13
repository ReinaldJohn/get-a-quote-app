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
        Schema::table('contractor_license_bonds_details', function (Blueprint $table) {
            $table->string('if_other_type_of_license', 255)->after('type_of_license')->nullable();
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
            $table->dropColumn('if_other_type_of_license');
        });
    }
};
