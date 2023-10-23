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
        Schema::table('business_owners_policy_details', function (Blueprint $table) {
            $table->string('bop_no_of_losses', 255)->after('last_update_to_plumbing_year');
            $table->decimal('bop_amount_of_claim', 10, 2)->after('bop_no_of_losses')->nullable();
            $table->date('bop_date_of_loss')->after('bop_amount_of_claim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_owners_policy_details', function (Blueprint $table) {
            $table->dropColumn('bop_no_of_losses');
            $table->dropColumn('bop_amount_of_claim');
            $table->dropColumn('bop_date_of_loss');
        });
    }
};
