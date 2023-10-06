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
        Schema::create('commercial_auto_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comm_auto_id')->constrained('commercial_auto_details');
            $table->tinyInteger('no_of_vehicle');
            $table->tinyInteger('no_of_drivers');
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
        Schema::dropIfExists('commercial_auto_details');
    }
};
