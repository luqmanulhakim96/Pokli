<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTotalPriceIntoEasyPaymentPurchaseRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('easy_payment_purchase_record', function (Blueprint $table) {
           $table->string('total_purchase')->nullable();
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
       Schema::table('easy_payment_purchase_record', function (Blueprint $table) {
           $table->dropColumn('total_purchase');
       });
     }
}
