<?php

namespace Webkul\Attribute\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AttributeOptionTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('attribute_options')->delete();

        DB::table('attribute_options')->insert([
            ['id' => '1', 'admin_name' => 'Red', 'sort_order' => '1', 'attribute_id' => '23'],
            ['id' => '2', 'admin_name' => 'Green', 'sort_order' => '2', 'attribute_id' => '23'],
            ['id' => '3', 'admin_name' => 'Yellow', 'sort_order' => '3', 'attribute_id' => '23'],
            ['id' => '4', 'admin_name' => 'Black', 'sort_order' => '4', 'attribute_id' => '23'],
            ['id' => '5', 'admin_name' => 'White', 'sort_order' => '5', 'attribute_id' => '23'],
            ['id' => '6', 'admin_name' => 'S', 'sort_order' => '1', 'attribute_id' => '24'],
            ['id' => '7', 'admin_name' => 'M', 'sort_order' => '2', 'attribute_id' => '24'],
            ['id' => '8', 'admin_name' => 'L', 'sort_order' => '3', 'attribute_id' => '24'],
            ['id' => '9', 'admin_name' => 'XL', 'sort_order' => '4', 'attribute_id' => '24'],
            ['id' => '10', 'admin_name' => 'Gold', 'sort_order' => '1', 'attribute_id' => '27'],
            ['id' => '11', 'admin_name' => 'Silver', 'sort_order' => '2', 'attribute_id' => '27'],
            ['id' => '12', 'admin_name' => 'GB 999', 'sort_order' => '1', 'attribute_id' => '28'],
            ['id' => '13', 'admin_name' => 'BK 999', 'sort_order' => '2', 'attribute_id' => '28'],
            ['id' => '14', 'admin_name' => 'BK 916', 'sort_order' => '4', 'attribute_id' => '28'],
            ['id' => '15', 'admin_name' => 'Din 999', 'sort_order' => '3', 'attribute_id' => '28'],
            ['id' => '16', 'admin_name' => 'Din 916', 'sort_order' => '5', 'attribute_id' => '28'],
            ['id' => '17', 'admin_name' => 'SB 999', 'sort_order' => '6', 'attribute_id' => '28'],
            ['id' => '18', 'admin_name' => 'Dir 999', 'sort_order' => '7', 'attribute_id' => '28'],
            ['id' => '19', 'admin_name' => 'Bar', 'sort_order' => '1', 'attribute_id' => '29'],
            ['id' => '20', 'admin_name' => 'Gelang', 'sort_order' => '2', 'attribute_id' => '29'],
            ['id' => '21', 'admin_name' => 'Subang', 'sort_order' => '3', 'attribute_id' => '29'],
            ['id' => '22', 'admin_name' => 'Cincin', 'sort_order' => '4', 'attribute_id' => '29'],
            ['id' => '23', 'admin_name' => 'Rantai', 'sort_order' => '5', 'attribute_id' => '29'],
            ['id' => '24', 'admin_name' => '0.5', 'sort_order' => '1', 'attribute_id' => '30'],
            ['id' => '25', 'admin_name' => '1', 'sort_order' => '2', 'attribute_id' => '30'],
            ['id' => '26', 'admin_name' => '5', 'sort_order' => '3', 'attribute_id' => '30'],
            ['id' => '27', 'admin_name' => '10', 'sort_order' => '4', 'attribute_id' => '30'],
            ['id' => '28', 'admin_name' => '20', 'sort_order' => '5', 'attribute_id' => '30'],
            ['id' => '29', 'admin_name' => '50', 'sort_order' => '6', 'attribute_id' => '30'],
            ['id' => '30', 'admin_name' => '100', 'sort_order' => '7', 'attribute_id' => '30'],
            ['id' => '31', 'admin_name' => '250', 'sort_order' => '8', 'attribute_id' => '30'],
            ['id' => '32', 'admin_name' => '500', 'sort_order' => '9', 'attribute_id' => '30'],
            ['id' => '33', 'admin_name' => '1000', 'sort_order' => '10', 'attribute_id' => '30'],
            ['id' => '34', 'admin_name' => '5000', 'sort_order' => '11', 'attribute_id' => '30']
        ]);

        DB::table('attribute_option_translations')->insert([
            ['id' => '1', 'locale' => 'en', 'label' => 'Red', 'attribute_option_id' => '1'],
            ['id' => '2', 'locale' => 'en', 'label' => 'Green', 'attribute_option_id' => '2'],
            ['id' => '3', 'locale' => 'en', 'label' => 'Yellow', 'attribute_option_id' => '3'],
            ['id' => '4', 'locale' => 'en', 'label' => 'Black', 'attribute_option_id' => '4'],
            ['id' => '5', 'locale' => 'en', 'label' => 'White', 'attribute_option_id' => '5'],
            ['id' => '6', 'locale' => 'en', 'label' => 'S', 'attribute_option_id' => '6'],
            ['id' => '7', 'locale' => 'en', 'label' => 'M', 'attribute_option_id' => '7'],
            ['id' => '8', 'locale' => 'en', 'label' => 'L', 'attribute_option_id' => '8'],
            ['id' => '9', 'locale' => 'en', 'label' => 'XL', 'attribute_option_id' => '9'],
            ['id' => '10', 'locale' => 'en', 'label' => 'Gold', 'attribute_option_id' => '10'],
            ['id' => '11', 'locale' => 'en', 'label' => 'Silver', 'attribute_option_id' => '11'],
            ['id' => '12', 'locale' => 'en', 'label' => 'GB 999', 'attribute_option_id' => '12'],
            ['id' => '13', 'locale' => 'en', 'label' => 'BK 999', 'attribute_option_id' => '13'],
            ['id' => '14', 'locale' => 'en', 'label' => 'BK 916', 'attribute_option_id' => '14'],
            ['id' => '15', 'locale' => 'en', 'label' => 'Din 999', 'attribute_option_id' => '15'],
            ['id' => '16', 'locale' => 'en', 'label' => 'Din 916', 'attribute_option_id' => '16'],
            ['id' => '17', 'locale' => 'en', 'label' => 'SB 999', 'attribute_option_id' => '17'],
            ['id' => '18', 'locale' => 'en', 'label' => 'Dir 999', 'attribute_option_id' => '18'],
            ['id' => '19', 'locale' => 'en', 'label' => 'Bar', 'attribute_option_id' => '19'],
            ['id' => '20', 'locale' => 'en', 'label' => 'Gelang', 'attribute_option_id' => '20'],
            ['id' => '21', 'locale' => 'en', 'label' => 'Subang', 'attribute_option_id' => '21'],
            ['id' => '22', 'locale' => 'en', 'label' => 'Cincin', 'attribute_option_id' => '22'],
            ['id' => '23', 'locale' => 'en', 'label' => 'Rantai', 'attribute_option_id' => '23'],
            ['id' => '24', 'locale' => 'en', 'label' => '0.5', 'attribute_option_id' => '24'],
            ['id' => '25', 'locale' => 'en', 'label' => '1', 'attribute_option_id' => '25'],
            ['id' => '26', 'locale' => 'en', 'label' => '5', 'attribute_option_id' => '26'],
            ['id' => '27', 'locale' => 'en', 'label' => '10', 'attribute_option_id' => '27'],
            ['id' => '28', 'locale' => 'en', 'label' => '20', 'attribute_option_id' => '28'],
            ['id' => '29', 'locale' => 'en', 'label' => '50', 'attribute_option_id' => '29'],
            ['id' => '30', 'locale' => 'en', 'label' => '100', 'attribute_option_id' => '30'],
            ['id' => '31', 'locale' => 'en', 'label' => '250', 'attribute_option_id' => '31'],
            ['id' => '32', 'locale' => 'en', 'label' => '500', 'attribute_option_id' => '32'],
            ['id' => '33', 'locale' => 'en', 'label' => '1000', 'attribute_option_id' => '33'],
            ['id' => '34', 'locale' => 'en', 'label' => '5000', 'attribute_option_id' => '34']
        ]);
    }
}
