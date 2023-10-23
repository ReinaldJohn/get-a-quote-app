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
            $table->string('wc_no_of_losses', 255)->after('number_of_employee');
            $table->decimal('wc_amount_of_claim', 10, 2)->after('wc_no_of_losses')->nullable();
            $table->date('wc_date_of_loss')->after('wc_amount_of_claim')->nullable();
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
            $table->dropColumn('wc_no_of_losses');
            $table->dropColumn('wc_amount_of_claim');
            $table->dropColumn('wc_date_of_loss');
        });
    }
};