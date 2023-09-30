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
        Schema::create('epli_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_info_id')->constrained('personal_info');
            $table->string('fein', 255);
            $table->string('current_epli', 255);
            $table->string('prior_carrier', 255);
            $table->string('prior_carrier_epli', 255);
            $table->date('effective_date');
            $table->string('previous_premium_amount', 255);
            $table->string('deductible_amount', 255);
            $table->string('fulltime_employees', 255);
            $table->string('parttime_employees', 255);
            $table->string('independent_contractors', 255);
            $table->string('volunteers', 255);
            $table->string('leased_or_seasonal', 255);
            $table->string('non_us_based_employee', 255);
            $table->string('total_employees', 255);
            $table->string('no_of_employees_located_at_ca', 255);
            $table->string('no_of_employees_located_at_ga', 255);
            $table->string('no_of_employees_located_at_tx', 255);
            $table->string('no_of_employees_located_at_fl', 255);
            $table->string('no_of_employees_located_at_ny', 255);
            $table->string('no_of_employees_located_at_nj', 255);
            $table->string('salary_range_up_to_60k', 255);
            $table->string('salary_range_60k_to_120k', 255);
            $table->string('salary_range_over_120k', 255);
            $table->string('voluntary', 255);
            $table->string('involuntary', 255);
            $table->string('laid-off', 255);
            $table->boolean('hr_policies_q1');
            $table->boolean('hr_policies_q2');
            $table->boolean('hr_policies_q3');
            $table->boolean('hr_policies_q4');
            $table->boolean('hr_policies_q5');
            $table->boolean('hr_policies_q6');
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
        Schema::dropIfExists('epli_details');
    }
};
