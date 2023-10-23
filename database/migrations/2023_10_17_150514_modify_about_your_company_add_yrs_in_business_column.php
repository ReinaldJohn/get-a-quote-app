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
        Schema::table('about_your_company_details', function (Blueprint $table) {
            $table->string('years_in_business', 255)->after('date_business_started');
        });

        Schema::table('about_your_company_details', function (Blueprint $table) {
            $table->dropColumn('no_of_losses');
            $table->dropColumn('explain_losses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_your_company_details', function (Blueprint $table) {
            $table->string('no_of_losses', 255);
            $table->text('explain_losses');
        });

        Schema::table('about_your_company_details', function (Blueprint $table) {
            $table->dropColumn('years_in_business');
        });
    }
};