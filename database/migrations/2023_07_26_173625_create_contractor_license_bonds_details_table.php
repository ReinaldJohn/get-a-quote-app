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
            $table->foreignId('personal_info_id')->constrained('personal_info');
            $table->string('owners_name', 100);
            $table->string('ssn', 15);
            $table->date('date_of_birth');
            $table->string('civil_status', 20);
            $table->string('spouse_name', 100)->nullable();
            $table->date('spouse_dob')->nullable();
            $table->string('spouse_ssn', 15)->nullable();
            $table->string('type_of_bond_requested', 100);
            $table->decimal('amount_of_bond', 9, 2);
            $table->string('term_of_bond', 10);
            $table->string('type_of_license', 50);
            $table->text('if_other_type_of_license')->nullable();
            $table->string('license_or_application_no', 100);
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
