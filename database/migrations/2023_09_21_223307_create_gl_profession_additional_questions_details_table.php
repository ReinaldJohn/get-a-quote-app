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
        Schema::create('gl_profession_additional_questions_details', function (Blueprint $table) {
            $table->id();
            $table->string('additional_question_answer_1', 255)->nullable();
            $table->string('additional_question_answer_2', 255)->nullable();
            $table->string('additional_question_answer_3', 255)->nullable();
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
        Schema::dropIfExists('gl_profession_additional_questions_details');
    }
};