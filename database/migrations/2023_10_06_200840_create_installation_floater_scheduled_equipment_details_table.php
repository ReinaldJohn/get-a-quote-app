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
        Schema::create('instfloat_scheduled_equipment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instfloat_id')->constrained('installation_floater_details');
            $table->string('sched_equip_type', 255);
            $table->string('sched_equip_manufacturer', 255);
            $table->string('sched_equip_serial_no', 255);
            $table->string('sched_equip_model', 255);
            $table->string('sched_equip_new_or_used', 255);
            $table->string('sched_equip_model_year', 255);
            $table->date('sched_equip_date_purchased');
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
        Schema::dropIfExists('instfloat_scheduled_equipment_details');
    }
};
