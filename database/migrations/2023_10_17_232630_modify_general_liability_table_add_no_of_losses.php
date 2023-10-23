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
            $table->string('gl_no_of_losses', 255)->after('subcon_cost');
            $table->decimal('gl_amount_of_claim', 10, 2)->after('gl_no_of_losses')->nullable();
            $table->date('gl_date_of_loss')->after('gl_amount_of_claim')->nullable();
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
            $table->dropColumn('gl_no_of_losses');
            $table->dropColumn('gl_amount_of_claim');
            $table->dropColumn('gl_date_of_loss');
        });
    }
};
