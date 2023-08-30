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
        Schema::create('tools_equipment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_info_id')->constrained('personal_info');
            $table->decimal('misc_tools_amount', 9, 2);
            $table->decimal('rented_leased_equipment_amount', 9, 2);
            $table->decimal('scheduled_equipment', 9, 2);
            $table->string('equipment_type', 100);
            $table->string('year', 4);
            $table->string('make', 100);
            $table->string('model', 100);
            $table->string('vin_or_serial_no', 100);
            $table->string('valuation', 100);
            $table->tinyInteger('no_of_losses_past_5_years');
            $table->text('explain_losses');
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
        Schema::dropIfExists('tools_equipment_details');
    }
};
