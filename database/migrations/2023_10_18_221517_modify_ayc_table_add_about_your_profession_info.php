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
            $table->decimal('annual_gross_receipt', 10, 2)->after('years_exp_as_contractor')->nullable();
            $table->integer('profession')->after('annual_gross_receipt')->nullable();
            $table->char('residential_percentage', 3)->after('profession')->nullable();
            $table->char('commercial_percentage', 3)->after('residential_percentage')->nullable();
            $table->char('new_construction_percentage', 3)->after('commercial_percentage')->nullable();
            $table->char('repair_remodel_percentage', 3)->after('new_construction_percentage')->nullable();
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
            $table->dropColumn('annual_gross_receipt');
            $table->dropColumn('profession');
            $table->dropColumn('residential_percentage');
            $table->dropColumn('commercial_percentage');
            $table->dropColumn('new_construction_percentage');
            $table->dropColumn('repair_remodel_percentage');
        });
    }
};