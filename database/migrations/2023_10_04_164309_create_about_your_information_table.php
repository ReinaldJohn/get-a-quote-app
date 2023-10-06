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
        Schema::create('about_your_company_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_info_id')->constrained('client_information');
            $table->string("business_ownership_structure", 255);
            $table->date('date_business_started');
            $table->string('years_exp_as_contractor', 20);
            $table->tinyInteger('no_of_losses');
            $table->text('explain_losses')->nullable();
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
        Schema::dropIfExists('about_your_company_details');
    }
};
