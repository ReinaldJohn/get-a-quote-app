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
        Schema::table('commercial_auto_details', function (Blueprint $table) {
            $table->string('auto_no_of_losses', 255)->after('no_of_drivers');
            $table->decimal('auto_amount_of_claim', 10, 2)->after('auto_no_of_losses')->nullable();
            $table->date('auto_date_of_loss')->after('auto_amount_of_claim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commercial_auto_details', function (Blueprint $table) {
            $table->dropColumn('auto_no_of_losses');
            $table->dropColumn('auto_amount_of_claim');
            $table->dropColumn('auto_date_of_loss');
        });
    }
};