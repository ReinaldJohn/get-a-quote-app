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
        Schema::create('builders_risk_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_info_id')->constrained('client_information');
            $table->decimal('value_of_existing_structure');
            $table->decimal('value_of_work_being_performed');
            $table->tinyInteger('period_of_insurance_or_duration_of_project');
            $table->string('construction_type', 255);
            $table->text('complete_descops');
            $table->string('square_footage', 255);
            $table->string('number_of_floors', 255);
            $table->string('number_of_units_dwelling', 255);
            $table->string('what_is_anticipated_occupancy', 255);
            $table->integer('last_update_to_roofing_year');
            $table->integer('last_update_to_heating_year');
            $table->integer('last_update_to_electrical_year');
            $table->integer('last_update_to_plumbing_year');
            $table->string('distance_to_nearest_fire_hydrant', 255);
            $table->string('distance_to_nearest_fire_station', 255);
            $table->string('will_structure_be_occupied_during_renovation', 255);
            $table->date('when_was_structure_built');
            $table->string('jobsite_security', 255);
            $table->boolean('does_scheduled_property_address_builders_risk_coverage');
            $table->string('carrier_name', 255)->nullable();
            $table->date('effective_date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('residential_or_commercial', 255);
            $table->boolean('has_project_started');
            $table->string('when_has_project_started', 255)->nullable();
            $table->string('what_are_work_done', 255)->nullable();
            $table->decimal('cost_of_work_done', 10, 2)->nullable();
            $table->string('what_are_the_remaining_works', 255)->nullable();
            $table->decimal('cost_of_remaining_works', 10, 2)->nullable();
            $table->date('when_will_project_start')->nullable();
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
        Schema::dropIfExists('builders_risk_details');
    }
};