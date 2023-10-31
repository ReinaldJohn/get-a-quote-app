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
            $table->string('ssn', 255)->change();
            $table->string('spouse_ssn', 255)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contractor_license_bonds_details', function (Blueprint $table) {
            $table->char('ssn', 11)->change();
            $table->char('spouse_ssn', 11)->change();
        });
    }
};