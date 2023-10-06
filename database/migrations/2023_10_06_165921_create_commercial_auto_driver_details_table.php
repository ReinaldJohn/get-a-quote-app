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
        Schema::create('commercial_auto_driver_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comm_auto_id')->constrained('commercial_auto_details');
            $table->string('drivers_name', 255);
            $table->string('drivers_license_number', 255);
            $table->string('mileage_radius', 255);
            $table->date('date_of_birth');
            $table->string('civil_status', 255);
            $table->string('spouse_name', 255);
            $table->date('spouse_date_of_birth');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commercial_auto_driver_details');
    }
};
