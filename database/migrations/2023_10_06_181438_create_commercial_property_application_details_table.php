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
        Schema::create('commercial_property_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_info_id')->constrained('client_information');
            $table->char('business_location_type', 100);
            $table->string('property_address', 255);
            $table->string('name_of_building_owner', 255);
            $table->decimal('value_cost_of_building', 10, 2);
            $table->decimal('business_property_limit', 10, 2);
            $table->boolean('does_have_more_than_one_location');
            $table->boolean('are_there_multiple_units_in_building');
            $table->string('construction_type', 255);
            $table->integer('year_built');
            $table->string('no_of_stories', 255);
            $table->string('total_building_sq_ft', 255);
            $table->boolean('does_building_equipped_with_fire_sprinkler');
            $table->string('distance_to_nearest_fire_hydrant', 255);
            $table->string('distance_to_nearest_fire_station', 255);
            $table->integer('protection_class');
            $table->string('protective_devices', 255);
            $table->integer('last_update_to_roofing_year');
            $table->integer('last_update_to_heating_year');
            $table->integer('last_update_to_electrical_year');
            $table->integer('last_update_to_plumbing_year');
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
        Schema::dropIfExists('commercial_property_details');
    }
};