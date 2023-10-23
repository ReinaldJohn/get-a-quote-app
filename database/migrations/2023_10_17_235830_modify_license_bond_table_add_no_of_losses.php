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
        Schema::table('contractor_license_bonds_details', function (Blueprint $table) {
            $table->string('bond_no_of_losses', 255)->after('effective_date');
            $table->decimal('bond_amount_of_claim', 10, 2)->after('bond_no_of_losses')->nullable();
            $table->date('bond_date_of_loss')->after('bond_amount_of_claim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contractor_license_bonds_details', function (Blueprint $table) {
            $table->dropColumn('bond_no_of_losses');
            $table->dropColumn('bond_amount_of_claim');
            $table->dropColumn('bond_date_of_loss');
        });
    }
};