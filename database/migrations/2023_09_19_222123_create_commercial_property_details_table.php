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
            $table->foreignId('personal_info_id')->constrained('personal_info');
            $table->string('business_location_located_in', 255);
            $table->text('property_address');
            $table->string('name_of_owner_of_building', 255);
            $table->decimal('value_cost_of_building', 9, 2);
            $table->decimal('business_property_limit', 9, 2);
            $table->boolean('more_than_one_location');
            $table->boolean('does_have_multiple_units');
            $table->string('construction_type', 255);
            $table->string('year_built', 4);
            $table->string('no_of_stories', 255);
            $table->string('total_building_sqft', 255);
            $table->boolean('does_building_equipped_fire_sprinklers');
            $table->string('distance_nearest_fire_hydrant', 255);
            $table->string('distance_nearest_fire_station', 255);
            $table->string('protection_class', 255);
            $table->string('protective_devices', 255);
            $table->string('last_update_to_roofing_year', 4);
            $table->string('last_update_to_heating_year', 4);
            $table->string('last_update_to_plumbing_year', 4);
            $table->string('last_update_to_electrical_year', 4);
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