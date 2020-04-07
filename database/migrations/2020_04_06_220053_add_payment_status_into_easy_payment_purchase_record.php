<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentStatusIntoEasyPaymentPurchaseRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('easy_payment_purchase_record', function (Blueprint $table) {
          $table->string('payment_status')->nullable();
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
          $table->dropColumn('payment_status');
      });
    }
}
