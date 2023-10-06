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
        Schema::create('gl_professions_additional_questions_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gl_id')->constrained('general_liability_details');
            $table->integer('classcode_id');
            $table->string('question', 255);
            $table->string('answer', 255);
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
        Schema::dropIfExists('gl_professions_additional_questions_details');
    }
};