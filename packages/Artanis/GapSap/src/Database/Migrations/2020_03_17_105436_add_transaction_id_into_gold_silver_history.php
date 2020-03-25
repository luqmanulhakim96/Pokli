<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransactionIdIntoGoldSilverHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('gold_silver_history', function (Blueprint $table) {
          $table->string('transaction_id')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('gold_silver_history', function (Blueprint $table) {
          $table->dropColumn('transaction_id');
      });
    }
}
