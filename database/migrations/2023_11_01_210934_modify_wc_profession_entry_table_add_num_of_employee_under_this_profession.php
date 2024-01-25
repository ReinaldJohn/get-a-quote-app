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
        Schema::table('workers_comp_profession_entry_details', function (Blueprint $table) {
            $table->string('if_profession_is_others', 255)->nullable()->after('profession_id');
            $table->integer('num_of_employee_under_same_profession')->after('annual_payroll_of_employee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workers_comp_profession_entry_details', function (Blueprint $table) {
            $table->dropColumn('if_profession_is_others');
            $table->dropColumn('num_of_employee_under_same_profession');
        });
    }
};