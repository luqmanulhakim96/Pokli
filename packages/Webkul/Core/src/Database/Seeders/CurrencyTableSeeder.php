<?php

namespace Webkul\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CurrencyTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('channels')->delete();

        DB::table('currencies')->delete();

        DB::table('currencies')->insert([
            'id' => 1,
            'code' => 'MYR',
            'name' => 'Malaysia Ringgit',
            'symbol' => 'RM'
        ]);
    }
}
