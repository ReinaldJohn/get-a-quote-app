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
        Schema::table('builders_risk_details', function (Blueprint $table) {
            $table->string('br_no_of_losses', 255)->after('when_will_project_start');
            $table->decimal('br_amount_of_claim', 10, 2)->after('br_no_of_losses')->nullable();
            $table->date('br_date_of_loss')->after('br_amount_of_claim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('builders_risk_details', function (Blueprint $table) {
            $table->dropColumn('br_no_of_losses');
            $table->dropColumn('br_amount_of_claim');
            $table->dropColumn('br_date_of_loss');
        });
    }
};
