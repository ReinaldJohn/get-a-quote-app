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
        Schema::table('installation_floater_details', function (Blueprint $table) {
            $table->string('instfloat_no_of_losses', 255)->after('additional_info_q4');
            $table->decimal('instfloat_amount_of_claim', 10, 2)->after('instfloat_no_of_losses')->nullable();
            $table->date('instfloat_date_of_loss')->after('instfloat_amount_of_claim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('installation_floater_details', function (Blueprint $table) {
            $table->dropColumn('instfloat_no_of_losses');
            $table->dropColumn('instfloat_amount_of_claim');
            $table->dropColumn('instfloat_date_of_loss');
        });
    }
};