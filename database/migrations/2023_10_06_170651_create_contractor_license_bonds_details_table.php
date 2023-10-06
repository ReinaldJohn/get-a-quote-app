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
        Schema::create('contractor_license_bonds_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_info_id')->constrained('client_information');
            $table->string('owners_name', 255);
            $table->char('ssn', 11);
            $table->date('date_of_birth');
            $table->string('civil_status', 100);
            $table->string('spouse_name', 255)->nullable();
            $table->date('spouse_date_of_birth')->nullable();
            $table->char('spouse_ssn', 11)->nullable();
            $table->string('type_of_bond_requested', 255);
            $table->decimal('amount_of_bond', 10, 2);
            $table->string('term_of_bond', 255);
            $table->string('type_of_license', 255);
            $table->string('license_number_or_application_number', 255);
            $table->date('effective_date');
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
        Schema::dropIfExists('contractor_license_bonds_details');
    }
};
