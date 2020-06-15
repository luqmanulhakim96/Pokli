<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDatatypeTotalGoldSilverInCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('customers', function (Blueprint $table) {
          $table->decimal('total_silver', 12, 4)->default(0)->change();
          $table->decimal('total_gold', 12, 4)->default(0)->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
