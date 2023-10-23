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
            $table->string('tools_no_of_losses', 255)->after('valuation');
            $table->decimal('tools_amount_of_loan', 10, 2)->after('tools_no_of_losses')->nullable();
            $table->date('tools_date_of_loss')->after('tools_amount_of_loan')->nullable();
        });

        Schema::table('tools_and_equipment_details', function (Blueprint $table) {
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
        Schema::table('tools_and_equipment_details', function (Blueprint $table) {
            $table->dropColumn('tools_no_of_losses');
            $table->dropColumn('tools_amount_of_loan');
            $table->dropColumn('tools_date_of_loss');
        });
    }
};