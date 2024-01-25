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
        Schema::table('workers_compensation_details', function (Blueprint $table) {
            $table->integer('number_of_employee')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workers_compensation_details', function (Blueprint $table) {
            $table->string('number_of_employee', 255)->change();
        });
    }
};