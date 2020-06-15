<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTotalSilverInCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('customers', function (Blueprint $table) {
           $table->string('total_silver')->nullable(); //existing silver from old database
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
           $table->dropColumn('total_silver');
       });
     }
}
