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
        Schema::create('personal_info', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 100);
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('address', 255);
            $table->string('city', 50);
            $table->string('state', 2);
            $table->string('zipcode', 5);
            $table->string('phone_number', 15);
            $table->string('fax_number')->nullable();
            $table->string('email_address', 50);
            $table->string('website', 50)->nullable();
            $table->string('contractor_license_no', 50);
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
        Schema::dropIfExists('new_personal_info_details');
    }
};