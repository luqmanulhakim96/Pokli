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
            $table->string('increment_id');
            $table->string('product_type')->nullable();
            $table->decimal('current_price_per_gram', 12, 2)->default(0)->nullable();
            $table->timestamp('current_price_datetime')->nullable();
            $table->decimal('purchase_amount', 12, 2)->default(0)->nullable();
            $table->decimal('purchase_quantity', 12, 4)->default(0)->nullable();

            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->string('purchase_type')->nullable();
            $table->timestamp('purchase_on')->nullable();
            $table->string('purchase_attachment')->nullable();
            $table->string('purchase_status')->nullable();
            $table->timestamp('purchase_status_datetime')->useCurrent();
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





