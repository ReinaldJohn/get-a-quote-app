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
            $table->string('epli_no_of_losses', 255)->after('hr_policies_and_procedure_q6');
            $table->decimal('epli_amount_of_claim', 10, 2)->after('epli_no_of_losses')->nullable();
            $table->date('epli_date_of_loss')->after('epli_amount_of_claim')->nullable();
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
            $table->dropColumn('epli_no_of_losses');
            $table->dropColumn('epli_amount_of_claim');
            $table->dropColumn('epli_date_of_loss');
        });
    }
};