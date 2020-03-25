<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJobHeirDetailsIntoCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('job_description')->nullable();
            $table->string('heir_name')->nullable();
            $table->string('heir_relation')->nullable();
            $table->string('heir_phone_no')->nullable();
            $table->string('heir_ic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('job_description');
            $table->dropColumn('heir_name');
            $table->dropColumn('heir_relation');
            $table->dropColumn('heir_phone_no');
            $table->dropColumn('heir_ic');
        });
    }
}
