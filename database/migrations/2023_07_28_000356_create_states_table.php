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
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('zipcode', 50);
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('state_abbr', 50);
            $table->string('county_area', 50);
            $table->string('code', 50);
            $table->string('latitude', 50);
            $table->string('longitude', 50);
            $table->string('some_field', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
};