<?php

namespace Webkul\Inventory\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class InventoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('inventory_sources')->delete();

        DB::table('inventory_sources')->insert([
            'id' => 1,
            'code' => 'default',
            'name' => 'Pokli',
            'contact_name' => 'Pokli Wealth Management Sdn Bhd',
            'contact_email' => 'admin@pokli.com',
            'contact_number' => '019-664 5066',
            'status' => 1,
            'country' => 'MY',
            'state' => 'Negeri Sembilan',
            'street' => 'Wisma Pokli, 101 Jalan S2F2, 1 Avenue, Garden Homes',
            'city' => 'Seremban 2',
            'postcode' => '70300',
        ]);
    }
}
