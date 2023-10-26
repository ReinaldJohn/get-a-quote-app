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
        Schema::table('tools_and_equipment_details', function (Blueprint $table) {
            $table->decimal('misc_tools', 10, 2)->change();
            $table->decimal('scheduled_equipment', 10, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tools_and_equipment_details', function (Blueprint $table) {
            $table->decimal('misc_tools', 6, 2)->change();
            $table->decimal('scheduled_equipment', 6, 2)->change();
        });
    }
};