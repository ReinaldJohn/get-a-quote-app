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
            $table->foreignId('client_info_id')->constrained('client_information');
            $table->tinyInteger('profession');
            $table->string('specify_profession_if_others', 255)->nullable();
            $table->char('residential', 3);
            $table->char('commercial', 3);
            $table->char('new_construction', 3);
            $table->char('repair_remodel', 3);
            $table->text('detailed_descops');
            $table->boolean('multiple_state_work');
            $table->decimal('cost_of_largest_project', 10, 2);
            $table->string('full_time', 255);
            $table->string('part_time', 255);
            $table->decimal('payroll_amount', 10, 2);
            $table->boolean('does_using_subcontractor');
            $table->decimal('subcon_cost', 10, 2)->nullable();
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