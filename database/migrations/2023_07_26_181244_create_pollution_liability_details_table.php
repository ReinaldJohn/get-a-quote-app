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
        Schema::create('pollution_liability_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_info_id')->constrained('personal_info');
            $table->tinyInteger('pollution_profession');
            $table->string('pollution_residential', 3);
            $table->string('pollution_commercial', 3);
            $table->string('pollution_new_construction', 3);
            $table->string('pollution_repair_remodel', 3);
            $table->text('pollution_detailed_descops');
            $table->string('pollution_cost_of_largest_proj_past_5_years', 20);
            $table->decimal('pollution_annual_gross_receipts', 9, 2);
            $table->string('pollution_no_field_employees', 3);
            $table->decimal('pollution_payroll_amount', 9, 2);
            $table->boolean('pollution_does_use_subcontractor');
            $table->decimal('pollution_subcontractor_cost', 9, 2)->nullable();
            $table->string('pollution_no_of_losses_past_5_years');
            $table->text('pollution_explain_losses')->nullable();
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
        Schema::dropIfExists('pollution_liability_details');
    }
};
