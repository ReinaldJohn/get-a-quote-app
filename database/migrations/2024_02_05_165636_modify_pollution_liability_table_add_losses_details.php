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
        Schema::table('pollution_liability_details', function (Blueprint $table) {
            $table->string('pollution_no_of_losses', 255)->after('nonenvserv_opts');
            $table->decimal('pollution_amount_of_claim', 10, 2)->after('pollution_no_of_losses')->nullable();
            $table->date('pollution_date_of_loss')->after('pollution_amount_of_claim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pollution_liability_details', function (Blueprint $table) {
            $table->dropColumn('pollution_no_of_losses');
            $table->dropColumn('pollution_amount_of_claim');
            $table->dropColumn('pollution_date_of_loss');
        });
    }
};