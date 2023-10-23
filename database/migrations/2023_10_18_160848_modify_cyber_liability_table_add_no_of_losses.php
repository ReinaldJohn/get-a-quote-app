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
        Schema::table('cyber_liability_details', function (Blueprint $table) {
            $table->string('cyber_no_of_losses', 255)->after('cyber_q8');
            $table->decimal('cyber_amount_of_claim', 10, 2)->after('cyber_no_of_losses')->nullable();
            $table->date('cyber_date_of_loss')->after('cyber_amount_of_claim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cyber_liability_details', function (Blueprint $table) {
            $table->dropColumn('cyber_no_of_losses');
            $table->dropColumn('cyber_amount_of_claim');
            $table->dropColumn('cyber_date_of_loss');
        });
    }
};
