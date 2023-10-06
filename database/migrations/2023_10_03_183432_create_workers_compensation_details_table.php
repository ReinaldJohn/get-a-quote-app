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
            $table->foreignId('client_info_id')->constrained('client_information');
            $table->decimal("gross_receipt", 10, 2)->nullable();
            $table->boolean("does_hire_subcontractor")->nullable();
            $table->decimal("subcontractor_cost_in_year", 10, 2)->nullable();
            $table->string("number_of_employee", 255)->nullable();
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