<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bop_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_info_id')->constrained('personal_info');
            $table->string('property_address', 255);
            $table->string('loss_payee_info', 255);
            $table->string('building_industry', 255);
            $table->string('occupancy', 255);
            $table->decimal('value_cost_of_building', 9, 2);
            $table->decimal('business_property_limit', 9, 2);
            $table->string('building_construction_type', 255);
            $table->string('year_built', 255);
            $table->string('no_of_stories', 255);
            $table->string('total_building_sqft', 255);
            $table->boolean('automatic_sprinkler_system');
            $table->string('automatic_fire_alarm', 255);
            $table->string('distance_near_fire_hydrant', 255);
            $table->enum('automatic_commercial_ext_system', ['', '0', '1', 'Not Applicable']);
            $table->string('automatic_burglar_alarm', 255);
            $table->boolean('security_cameras');
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
        Schema::dropIfExists('bop_details');
    }
};