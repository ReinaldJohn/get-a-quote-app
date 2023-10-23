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
        Schema::table('errors_and_omission_details', function (Blueprint $table) {
            $table->string('eo_no_of_losses', 255)->after('hr_sub_q4');
            $table->decimal('eo_amount_of_claim', 10, 2)->after('eo_no_of_losses')->nullable();
            $table->date('eo_date_of_loss')->after('eo_amount_of_claim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('errors_and_omission_details', function (Blueprint $table) {
            $table->dropColumn('eo_no_of_losses');
            $table->dropColumn('eo_amount_of_claim');
            $table->dropColumn('eo_date_of_loss');
        });
    }
};
