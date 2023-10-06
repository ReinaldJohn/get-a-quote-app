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
        Schema::create('errors_and_omission_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_info_id')->constrained('client_information');
            $table->string('requested_limits', 255);
            $table->string('requested_limits_if_others', 255)->nullable();
            $table->string('requested_deductible', 255);
            $table->string('requested_deductible_if_others', 255)->nullable();
            $table->boolean('business_entity_q1');
            $table->string('business_entity_sub_q1', 255)->nullable();
            $table->boolean('business_entity_q2');
            $table->string('business_entity_sub_q2', 255)->nullable();
            $table->boolean('business_entity_q3');
            $table->string('business_entity_sub_q3', 255)->nullable();
            $table->boolean('business_entity_q4');
            $table->string('business_entity_sub_q4', 255)->nullable();
            $table->boolean('business_entity_q5');
            $table->string('business_entity_sub_q5', 255)->nullable();
            $table->string('number_of_employees', 255);
            $table->string('full_time_employees', 255);
            $table->decimal('full_time_salary_range', 10, 2);
            $table->string('part_time_employees', 255);
            $table->decimal('part_time_salary_range', 10, 2);
            $table->boolean('hr_q1');
            $table->string('hr_sub_q1', 255)->nullable();
            $table->boolean('hr_q2');
            $table->string('hr_sub_q2', 255)->nullable();
            $table->boolean('hr_q3');
            $table->string('hr_sub_q3', 255)->nullable();
            $table->boolean('hr_q4');
            $table->string('hr_sub_q4', 255)->nullable();
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
        Schema::dropIfExists('errors_and_omission_details');
    }
};