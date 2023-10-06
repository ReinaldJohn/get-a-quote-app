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
        Schema::create('workers_comp_owners_info_entry_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wc_id')->constrained('workers_compensation_details');
            $table->string('owners_name', 255);
            $table->string('title_relationship', 255);
            $table->tinyInteger('ownership_percentage');
            $table->char('excluded_or_included', 50);
            $table->char('ssn', 11);
            $table->char('fein', 10);
            $table->date('owners_date_of_birth');
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
        Schema::dropIfExists('workers_comp_owners_info_entry_details');
    }
};
