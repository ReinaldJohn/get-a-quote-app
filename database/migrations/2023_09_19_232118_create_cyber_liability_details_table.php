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
        Schema::create('cyber_liability_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_info_id')->constrained('personal_info');
            $table->string('it_contact_name', 255);
            $table->string('it_contact_number', 255);
            $table->string('it_contact_email', 255);
            $table->string('cyber_follow_up_q1', 255);
            $table->boolean('cyber_follow_up_q2');
            $table->boolean('cyber_follow_up_q3');
            $table->boolean('cyber_follow_up_q4');
            $table->boolean('cyber_follow_up_q5');
            $table->boolean('cyber_follow_up_q6');
            $table->boolean('cyber_follow_up_q7');
            $table->boolean('cyber_follow_up_q8');
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
        Schema::dropIfExists('cyber_liability_details');
    }
};
