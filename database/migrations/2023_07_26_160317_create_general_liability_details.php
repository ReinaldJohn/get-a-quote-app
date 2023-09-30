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
        Schema::create('general_liability_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_info_id')->constrained('personal_info');
            $table->tinyInteger('profession');
            $table->string('residential', 3);
            $table->string('commercial', 3);
            $table->string('new_construction', 3);
            $table->string('repair_remodel', 3);
            $table->text('detailed_descops');
            $table->decimal('cost_of_largest_proj_past_5_years', 9, 2);
            $table->decimal('annual_gross_receipts', 9, 2);
            $table->string('no_field_employees', 3);
            $table->string('payroll_amount', 20);
            $table->boolean('does_use_subcontractor');
            $table->decimal('subcontractor_cost', 9, 2)->nullable();
            $table->string('no_of_losses_past_5_years');
            $table->text('explain_losses')->nullable();
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
        Schema::dropIfExists('general_liability_details');
    }
};