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
        Schema::table('commercial_property_details', function (Blueprint $table) {
            $table->string('property_no_of_losses', 255)->after('last_update_to_plumbing_year');
            $table->decimal('property_amount_of_claim', 10, 2)->after('property_no_of_losses')->nullable();
            $table->date('property_date_of_loss')->after('property_amount_of_claim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commercial_property_details', function (Blueprint $table) {
            $table->dropColumn('property_no_of_losses');
            $table->dropColumn('property_amount_of_claim');
            $table->dropColumn('property_date_of_loss');
        });
    }
};
