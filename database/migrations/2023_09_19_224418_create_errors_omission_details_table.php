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
        Schema::create('errors_omission_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_info_id')->constrained('personal_info');
            $table->string('requested_limits', 255);
            $table->string('requested_limits_explain', 255);
            $table->string('requested_deductible', 255);
            $table->string('requested_deductible_explain', 255);
            $table->boolean('business_entity_q1');
            $table->boolean('business_entity_q2');
            $table->boolean('business_entity_q3');
            $table->boolean('business_entity_q4');
            $table->boolean('business_entity_q5');
            $table->boolean('business_entity_q6');
            $table->string('number_of_employees', 255);
            $table->string('full_time_employees', 255);
            $table->string('full_time_salary_range', 255);
            $table->string('part_time_employees', 255);
            $table->string('part_time_salary_range', 255);
            $table->boolean('employment_practice_question');
            $table->boolean('human_resource_q1');
            $table->boolean('human_resource_q2');
            $table->boolean('human_resource_q3');
            $table->boolean('human_resource_q4');
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
        Schema::dropIfExists('errors_omission_details');
    }
};
