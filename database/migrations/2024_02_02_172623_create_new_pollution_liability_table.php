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
        Schema::create('pollution_liability_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_info_id')->constrained('commercial_auto_details');
            $table->string('envcontserv_proj_rev', 255);
            $table->string('envcontserv_subcon_work', 255);
            $table->string('envcontserv_total_proj_rev', 255);
            $table->string('envcontserv_total_subcon_work', 255);
            $table->json('envcontserv_opts');
            $table->string('envconsultserv_proj_rev', 255);
            $table->string('envconsultserv_subcon_work', 255);
            $table->string('envconsultserv_total_proj_rev', 255);
            $table->string('envconsultserv_total_subcon_work', 255);
            $table->json('envconsultserv_opts');
            $table->string('nonenvserv_proj_rev', 255);
            $table->string('nonenvserv_subcon_work', 255);
            $table->string('nonenvserv_total_proj_rev', 255);
            $table->string('nonenvserv_total_subcon_work', 255);
            $table->json('nonenvserv_opts');
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
        Schema::dropIfExists('pollution_liability_details');
    }
};