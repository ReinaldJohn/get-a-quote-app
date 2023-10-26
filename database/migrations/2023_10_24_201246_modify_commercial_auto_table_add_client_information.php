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
        Schema::table('commercial_auto_details', function (Blueprint $table) {
            $table->boolean('are_you_driver')->after('client_info_id');
            $table->string('client_full_name', 255)->after('are_you_driver');
            $table->date('client_date_of_birth')->nullable()->after('client_full_name');
            $table->string('client_marital_status', 255)->after('client_date_of_birth');
            $table->string('client_spouse_name', 255)->nullable()->after('client_marital_status');
            $table->date('client_spouse_date_of_birth')->nullable()->after('client_spouse_name');
            $table->string('client_license_no', 255)->after('client_spouse_date_of_birth');
            $table->string('client_years_of_driving_exp', 255)->after('client_license_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commercial_auto_details', function (Blueprint $table) {
            $table->dropColumn('are_you_driver');
            $table->dropColumn('client_full_name');
            $table->dropColumn('client_date_of_birth');
            $table->dropColumn('client_marital_status');
            $table->dropColumn('client_spouse_name');
            $table->dropColumn('client_spouse_date_of_birth');
            $table->dropColumn('client_license_no');
            $table->dropColumn('client_years_of_driving_exp');
        });
    }
};