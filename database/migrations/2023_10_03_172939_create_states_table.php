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
            $table->char('zipcode', 5);
            $table->string('city', 255);
            $table->string('state', 255);
            $table->char('state_abbr', 2);
            $table->string('county_area', 255);
            $table->char('code', 3);
            $table->decimal('latitude', 10, 6);
            $table->decimal('longitude', 10, 6);
            $table->char('some_field', 1);
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
        Schema::dropIfExists('states');
    }
};