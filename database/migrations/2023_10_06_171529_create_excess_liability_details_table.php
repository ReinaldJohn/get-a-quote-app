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
            $table->foreignId('client_info_id')->constrained('client_information');
            $table->decimal('excess_limits', 10, 2);
            $table->date('gl_effective_date');
            $table->tinyInteger('no_of_losses')->nullable();
            $table->text('explain_losses')->nullable();
            $table->string('insurance_carrier', 255);
            $table->string('policy_number_or_quote_number', 255);
            $table->decimal('policy_premium', 10, 2);
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
