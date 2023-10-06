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
        Schema::create('client_information', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 255);
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('address', 255);
            $table->string('city', 255);
            $table->integer('state');
            $table->char('zipcode', 5);
            $table->string('phone_number', 15);
            $table->string('fax_number', 15)->nullable();
            $table->string('email_address', 50);
            $table->string('website', 255)->nullable();
            $table->string('contractor_license_no', 50)->nullable();
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
        Schema::dropIfExists('client_information');
    }
};