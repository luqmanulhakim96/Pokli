<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EasyPurchasePaymentRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('easy_payment_purchase_record', function (Blueprint $table) {
          $table->bigIncrements('id');

          $table->string('date_payment');
          $table->string('monthly_price');

          $table->integer('order_id')->unsigned()->nullable();
          $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

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
      Schema::dropIfExists('easy_payment_purchase_record');
    }
}
