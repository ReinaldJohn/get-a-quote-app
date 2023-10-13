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
        Schema::create('commercial_auto_vehicle_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comm_auto_id')->constrained('commercial_auto_details');
            $table->integer('year');
            $table->string('maker', 255);
            $table->string('model', 255);
            $table->string('vin', 255);
            $table->string('mileage_radius', 255);
            $table->string('garage_address', 255);
            $table->decimal('coverage_limits', 10, 2);
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
        Schema::dropIfExists('commercial_auto_vehicle_details');
    }
};
