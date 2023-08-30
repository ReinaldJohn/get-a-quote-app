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
        Schema::create('excess_liability_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_info_id')->constrained('personal_info');
            $table->decimal('excess_limits', 9, 2);
            $table->date('gl_effective_date');
            $table->tinyInteger('no_of_losses_past_5_years');
            $table->text('explain_losses');
            $table->string('insurance_carrier', 100);
            $table->string('policy_quote_number', 50);
            $table->decimal('policy_premium', 9, 2);
            $table->date('effective_date');
            $table->date('expiration_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excess_liability_details');
    }
};
