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
        Schema::create('installation_floater_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_info_id')->constrained('client_information');
            $table->string('type_of_operation', 255);
            $table->string('type_of_equipment', 255);
            $table->string('deductible_amount', 255);
            $table->string('location', 255);
            $table->string('months_in_storage', 255);
            $table->decimal('max_value_of_equipment_storing', 10, 2);
            $table->decimal('max_value_of_building_storage', 10, 2);
            $table->string('type_of_security_placed_in_building', 255);
            $table->string('unsched_type_of_equipment', 255);
            $table->decimal('unsched_max_value_of_equipment_storing', 10, 2);
            $table->boolean('additional_info_q1');
            $table->boolean('additional_info_q2');
            $table->boolean('additional_info_q3');
            $table->boolean('additional_info_q4');
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
        Schema::dropIfExists('installation_floater_details');
    }
};
