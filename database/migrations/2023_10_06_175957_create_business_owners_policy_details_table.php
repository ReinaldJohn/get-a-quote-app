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
        Schema::create('business_owners_policy_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_info_id')->constrained('client_information');
            $table->string('property_address', 255);
            $table->string('loss_payee_information', 255);
            $table->string('building_industry', 255);
            $table->string('who_owns_building', 255);
            $table->decimal('value_of_cost_building', 10, 2);
            $table->decimal('business_property_limit', 10, 2);
            $table->string('building_construction_type', 255);
            $table->integer('year_built');
            $table->string('no_of_stories', 255);
            $table->string('total_building_sq_ft', 255);
            $table->boolean('automatic_sprinkler_system');
            $table->string('automatic_file_alarm', 255);
            $table->string('distance_nearest_fire_hydrant', 255);
            $table->string('distance_nearest_fire_station', 255);
            $table->string('automatic_commercial_cooking_extinguish_system', 255);
            $table->boolean('security_cameras');
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
        Schema::dropIfExists('business_owners_policy_details');
    }
};
