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
        Schema::create('workers_compensation_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_info_id')->constrained('personal_info');
            $table->tinyInteger('no_of_professions');
            $table->string('profession_1', 100);
            $table->decimal('annual_payroll_1', 9, 2);
            $table->string('full_time_1', 3);
            $table->string('part_time_1', 3);
            $table->string('profession_2', 100)->nullable();
            $table->decimal('annual_payroll_2', 9, 2)->nullable();
            $table->string('full_time_2', 3)->nullable();
            $table->string('part_time_2', 3)->nullable();
            $table->string('profession_3', 100)->nullable();
            $table->decimal('annual_payroll_3', 9, 2)->nullable();
            $table->string('full_time_3', 3)->nullable();
            $table->string('part_time_3', 3)->nullable();
            $table->string('profession_4', 100)->nullable();
            $table->decimal('annual_payroll_4', 9, 2)->nullable();
            $table->string('full_time_4', 3)->nullable();
            $table->string('part_time_4', 3)->nullable();
            $table->string('profession_5', 100)->nullable();
            $table->decimal('annual_payroll_5', 9, 2)->nullable();
            $table->string('full_time_5', 3)->nullable();
            $table->string('part_time_5', 3)->nullable();
            $table->string('profession_6', 100)->nullable();
            $table->decimal('annual_payroll_6', 9, 2)->nullable();
            $table->string('full_time_6', 3)->nullable();
            $table->string('part_time_6', 3)->nullable();
            $table->string('profession_7', 100)->nullable();
            $table->decimal('annual_payroll_7', 9, 2)->nullable();
            $table->string('full_time_7', 3)->nullable();
            $table->string('part_time_7', 3)->nullable();
            $table->string('profession_8', 100)->nullable();
            $table->decimal('annual_payroll_8', 9, 2)->nullable();
            $table->string('full_time_8', 3)->nullable();
            $table->string('part_time_8', 3)->nullable();
            $table->decimal('gross_receipts', 9, 2);
            $table->string('does_hire_subcon', 3);
            $table->decimal('subcon_cost_year', 9, 2)->nullable();
            $table->string('num_of_employees', 3);
            $table->string('name', 255);
            $table->string('title_relationship', 255);
            $table->string('ownership', 255);
            $table->string('excluded_included', 255);
            $table->string('ssn', 255);
            $table->string('fein', 255);
            $table->date('date_of_birth');
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
        Schema::dropIfExists('workers_compensation_details');
    }
};
