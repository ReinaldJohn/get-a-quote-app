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
        Schema::create('commercial_auto_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_info_id')->constrained('personal_info');
            $table->tinyInteger('no_of_vehicles');
            $table->string('year_1', 4);
            $table->string('make_1', 100);
            $table->string('model_1', 100);
            $table->string('vehicle_id_1', 100);
            $table->string('mileage_radius_1', 100);
            $table->text('garage_address_1');
            $table->decimal('coverage_limits_1', 9, 2);
            $table->string('year_2', 4)->nullable();
            $table->string('make_2', 100)->nullable();
            $table->string('model_2', 100)->nullable();
            $table->string('vehicle_id_2', 100)->nullable();
            $table->string('mileage_radius_2', 100)->nullable();
            $table->text('garage_address_2')->nullable();
            $table->decimal('coverage_limits_2', 9, 2)->nullable();
            $table->string('year_3', 4)->nullable();
            $table->string('make_3', 100)->nullable();
            $table->string('model_3', 100)->nullable();
            $table->string('vehicle_id_3', 100)->nullable();
            $table->string('mileage_radius_3', 100)->nullable();
            $table->text('garage_address_3')->nullable();
            $table->decimal('coverage_limits_3', 9, 2)->nullable();
            $table->string('year_4', 4)->nullable();
            $table->string('make_4', 100)->nullable();
            $table->string('model_4', 100)->nullable();
            $table->string('vehicle_id_4', 100)->nullable();
            $table->string('mileage_radius_4', 100)->nullable();
            $table->text('garage_address_4')->nullable();
            $table->decimal('coverage_limits_4', 9, 2)->nullable();
            $table->string('year_5', 4)->nullable();
            $table->string('make_5', 100)->nullable();
            $table->string('model_5', 100)->nullable();
            $table->string('vehicle_id_5', 100)->nullable();
            $table->string('mileage_radius_5', 100)->nullable();
            $table->text('garage_address_5')->nullable();
            $table->decimal('coverage_limits_5', 9, 2)->nullable();
            $table->string('year_6', 4)->nullable();
            $table->string('make_6', 100)->nullable();
            $table->string('model_6', 100)->nullable();
            $table->string('vehicle_id_6', 100)->nullable();
            $table->string('mileage_radius_6', 100)->nullable();
            $table->text('garage_address_6')->nullable();
            $table->decimal('coverage_limits_6', 9, 2)->nullable();
            $table->string('year_7', 4)->nullable();
            $table->string('make_7', 100)->nullable();
            $table->string('model_7', 100)->nullable();
            $table->string('vehicle_id_7', 100)->nullable();
            $table->string('mileage_radius_7', 100)->nullable();
            $table->text('garage_address_7')->nullable();
            $table->decimal('coverage_limits_7', 9, 2)->nullable();
            $table->string('year_8', 4)->nullable();
            $table->string('make_8', 100)->nullable();
            $table->string('model_8', 100)->nullable();
            $table->string('vehicle_id_8', 100)->nullable();
            $table->string('mileage_radius_8', 100)->nullable();
            $table->text('garage_address_8')->nullable();
            $table->decimal('coverage_limits_8', 9, 2)->nullable();
            $table->tinyInteger('no_of_drivers');
            $table->string('drivers_name_1', 100);
            $table->string('drivers_lic_no_1', 50);
            $table->string('drivers_mileage_radius_1', 100);
            $table->date('drivers_dob_1');
            $table->string('drivers_civil_status_1', 20);
            $table->string('drivers_spouse_name_1', 100)->nullable();
            $table->date('drivers_spouse_dob_1')->nullable();
            $table->string('drivers_name_2', 100)->nullable();
            $table->string('drivers_lic_no_2', 50)->nullable();
            $table->string('drivers_mileage_radius_2', 100)->nullable();
            $table->date('drivers_dob_2')->nullable();
            $table->string('drivers_civil_status_2', 20)->nullable();
            $table->string('drivers_spouse_name_2', 100)->nullable();
            $table->date('drivers_spouse_dob_2')->nullable();
            $table->string('drivers_name_3', 100)->nullable();
            $table->string('drivers_lic_no_3', 50)->nullable();
            $table->string('drivers_mileage_radius_3', 100)->nullable();
            $table->date('drivers_dob_3')->nullable();
            $table->string('drivers_civil_status_3', 20)->nullable();
            $table->string('drivers_spouse_name_3', 100)->nullable();
            $table->date('drivers_spouse_dob_3')->nullable();
            $table->string('drivers_name_4', 100)->nullable();
            $table->string('drivers_lic_no_4', 50)->nullable();
            $table->string('drivers_mileage_radius_4', 100)->nullable();
            $table->date('drivers_dob_4')->nullable();
            $table->string('drivers_civil_status_4', 20)->nullable();
            $table->string('drivers_spouse_name_4', 100)->nullable();
            $table->date('drivers_spouse_dob_4')->nullable();
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
        Schema::dropIfExists('commercial_auto_details');
    }
};
