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
            $table->foreignId('personal_info_id')->constrained('personal_info');
            $table->tinyInteger('territory_of_operation');
            $table->string('type_of_operation', 255);
            $table->string('scheduled_type_of_equipment_working_with', 255);
            $table->string('deductible_amount', 255);
            $table->string('location', 255);
            $table->string('months_in_storage', 255);
            $table->string('max_value_equipment_storage', 255);
            $table->string('max_value_buildng_storage', 255);
            $table->string('type_of_security_within_building', 255);
            $table->string('unscheduled_type_of_equipment_working_with', 255);
            $table->string('max_value_equipment_storing', 255);
            $table->boolean('addtional_info_q1');
            $table->boolean('addtional_info_q2');
            $table->boolean('addtional_info_q3');
            $table->boolean('addtional_info_q4');
            $table->string('scheduled_equipment_type_1', 255);
            $table->string('scheduled_equipment_mfg_1', 255);
            $table->string('scheduled_equipment_id_or_serial_1', 255);
            $table->string('scheduled_equipment_model_1', 255);
            $table->string('scheduled_equipment_new_or_used_1', 255);
            $table->string('scheduled_equipment_model_year_1', 255);
            $table->string('scheduled_equipment_date_purchased_1', 255);
            $table->string('scheduled_equipment_type_2', 255)->nullable();
            $table->string('scheduled_equipment_mfg_2', 255)->nullable();
            $table->string('scheduled_equipment_id_or_serial_2', 255)->nullable();
            $table->string('scheduled_equipment_model_2', 255)->nullable();
            $table->string('scheduled_equipment_new_or_used_2', 255)->nullable();
            $table->string('scheduled_equipment_model_year_2', 255)->nullable();
            $table->string('scheduled_equipment_date_purchased_2', 255)->nullable();
            $table->string('scheduled_equipment_type_3', 255)->nullable();
            $table->string('scheduled_equipment_mfg_3', 255)->nullable();
            $table->string('scheduled_equipment_id_or_serial_3', 255)->nullable();
            $table->string('scheduled_equipment_model_3', 255)->nullable();
            $table->string('scheduled_equipment_new_or_used_3', 255)->nullable();
            $table->string('scheduled_equipment_model_year_3', 255)->nullable();
            $table->string('scheduled_equipment_date_purchased_3', 255)->nullable();
            $table->string('scheduled_equipment_type_4', 255)->nullable();
            $table->string('scheduled_equipment_mfg_4', 255)->nullable();
            $table->string('scheduled_equipment_id_or_serial_4', 255)->nullable();
            $table->string('scheduled_equipment_model_4', 255)->nullable();
            $table->string('scheduled_equipment_new_or_used_4', 255)->nullable();
            $table->string('scheduled_equipment_model_year_4', 255)->nullable();
            $table->string('scheduled_equipment_date_purchased_4', 255)->nullable();
            $table->string('scheduled_equipment_type_5', 255)->nullable();
            $table->string('scheduled_equipment_mfg_5', 255)->nullable();
            $table->string('scheduled_equipment_id_or_serial_5', 255)->nullable();
            $table->string('scheduled_equipment_model_5', 255)->nullable();
            $table->string('scheduled_equipment_new_or_used_5', 255)->nullable();
            $table->string('scheduled_equipment_model_year_5', 255)->nullable();
            $table->string('scheduled_equipment_date_purchased_5', 255)->nullable();
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