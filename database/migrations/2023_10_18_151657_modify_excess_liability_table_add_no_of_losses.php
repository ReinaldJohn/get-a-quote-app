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
        Schema::table('excess_liability_details', function (Blueprint $table) {
            $table->string('excess_no_of_losses', 255)->after('expiration_date');
            $table->decimal('excess_amount_of_loan', 10, 2)->after('excess_no_of_losses')->nullable();
            $table->date('excess_date_of_loss')->after('excess_amount_of_loan')->nullable();
        });

        Schema::table('excess_liability_details', function (Blueprint $table) {
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
        Schema::table('excess_liability_details', function (Blueprint $table) {
            $table->dropColumn('excess_no_of_losses');
            $table->dropColumn('excess_amount_of_loan');
            $table->dropColumn('excess_date_of_losss');
        });
    }
};
