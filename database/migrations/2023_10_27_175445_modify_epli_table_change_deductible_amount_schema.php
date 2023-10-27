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
        Schema::table('epli_details', function (Blueprint $table) {
            $table->string('deductible_amount', 255)->change();
        });
        Schema::table('epli_details', function (Blueprint $table) {
            $table->decimal('deductible_amount_if_others', 10, 2)->after('deductible_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('epli_details', function (Blueprint $table) {
            $table->decimal('deductible_amount', 10, 2)->change();
        });
        Schema::table('epli_details', function (Blueprint $table) {
            $table->dropColumn('deductible_amount_if_others');
        });
    }
};