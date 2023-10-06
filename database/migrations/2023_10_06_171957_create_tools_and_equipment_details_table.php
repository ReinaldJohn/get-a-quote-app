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
        Schema::create('tools_and_equipment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_info_id')->constrained('client_information');
            $table->decimal('misc_tools', 6, 2);
            $table->decimal('rented_or_leased_equipment', 10, 2);
            $table->decimal('scheduled_equipment', 6, 2);
            $table->string('equipment_type', 255);
            $table->string('year', 4);
            $table->string('maker', 255);
            $table->string('model', 255);
            $table->string('vin', 255);
            $table->string('valuation', 255);
            $table->tinyInteger('no_of_losses')->nullable();
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
        Schema::dropIfExists('tools_and_equipment_details');
    }
};