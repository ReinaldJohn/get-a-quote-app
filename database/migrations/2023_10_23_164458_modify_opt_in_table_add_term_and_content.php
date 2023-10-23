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
        Schema::table('opt_in_list', function (Blueprint $table) {
            $table->string('utm_term', 255)->after('utm_campaign')->nullable();
            $table->string('utm_content', 255)->after('utm_term')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opt_in_list', function (Blueprint $table) {
            $table->dropColumn('utm_term');
            $table->dropColumn('utm_content');
        });
    }
};