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
            $table->foreignId('client_info_id')->constrained('client_information');
            $table->char('fein', 10);
            $table->string('current_epli', 255);
            $table->string('prior_carrier', 255);
            $table->string('prior_carrier_epli', 255);
            $table->date('effective_date');
            $table->decimal('previous_premium_amount', 10, 2);
            $table->decimal('deductible_amount', 10, 2);
            $table->string('full_time_employee', 255);
            $table->string('part_time_employee', 255);
            $table->string('independent_contractors', 255);
            $table->string('volunteers', 255);
            $table->string('leased_or_seasonal', 255);
            $table->string('non_us_based_employee', 255);
            $table->string('total_employees', 255);
            $table->string('located_at_ca', 255);
            $table->string('located_at_ga', 255);
            $table->string('located_at_tx', 255);
            $table->string('located_at_fl', 255);
            $table->string('located_at_ny', 255);
            $table->string('located_at_nj', 255);
            $table->decimal('up_to_60k', 10, 2);
            $table->decimal('60k_to_120k', 10, 2);
            $table->decimal('over_120k', 10, 2);
            $table->string('voluntary', 255);
            $table->string('involuntary', 255);
            $table->string('laid_off', 255);
            $table->boolean('hr_policies_and_procedure_q1');
            $table->boolean('hr_policies_and_procedure_q2');
            $table->boolean('hr_policies_and_procedure_q3');
            $table->boolean('hr_policies_and_procedure_q4');
            $table->boolean('hr_policies_and_procedure_q5');
            $table->boolean('hr_policies_and_procedure_q6');
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
