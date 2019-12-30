<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoldSilverHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gold_silver_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('activity')->nullable();
            $table->string('increment_id')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('product_type')->nullable();
            $table->decimal('current_price_per_gram', 12, 2)->default(0)->nullable();
            $table->timestamp('current_price_datetime')->nullable();
            $table->decimal('amount', 12, 2)->default(0)->nullable();
            $table->decimal('quantity', 12, 4)->default(0)->nullable();

            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->string('payment_method')->nullable();
            $table->timestamp('payment_on')->nullable();
            $table->string('payment_attachment')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('status_datetime')->useCurrent();
            // $table->timestamp('purchase_status_datetime')->nullable()->default(null);

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
        Schema::dropIfExists('gold_silver_history');
    }
}








