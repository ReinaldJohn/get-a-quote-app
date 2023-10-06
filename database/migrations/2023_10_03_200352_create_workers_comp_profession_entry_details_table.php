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
        Schema::create('workers_comp_profession_entry_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wc_id')->constrained('workers_compensation_details');
            $table->mediumInteger('profession_id');
            $table->decimal('annual_payroll_of_employee', 10, 2);
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
        Schema::dropIfExists('workers_comp_profession_entry_details');
    }
};
