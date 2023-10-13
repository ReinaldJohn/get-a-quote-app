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
        Schema::table('general_liability_details', function (Blueprint $table) {
            $table->decimal('annual_gross_receipt', 10, 2)->after('profession');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_liability_details', function (Blueprint $table) {
            $table->dropColumn('annual_gross_receipt');
        });
    }
};