<?php

namespace Webkul\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ChannelTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('channels')->delete();

        DB::table('channels')->insert([
                'id' => 1,
                'code' => 'default',
                'name' => 'Pokli',
                'description' => 'Pokli Wealth Management',
                'root_category_id' => 1,
                'theme' => 'pokli-default',
                'hostname' => 'pokli.com.my',
                'home_page_content' => '<p>@include("liveprice::liveprice") @include("shop::home.slider")</p><div class="banner-container"><div class="left-banner"></div><div class="right-banner"></div></div>',
                'footer_content' => '<div class="list-container"><span class="list-heading">Quick Links</span><ul class="list-group"><li><a href="@php echo route(\'shop.cms.page\', \'about-us\') @endphp">About Us</a></li><li><a href="@php echo route(\'shop.cms.page\', \'return-policy\') @endphp">Return Policy</a></li><li><a href="@php echo route(\'shop.cms.page\', \'refund-policy\') @endphp">Refund Policy</a></li><li><a href="@php echo route(\'shop.cms.page\', \'terms-conditions\') @endphp">Terms and conditions</a></li><li><a href="@php echo route(\'shop.cms.page\', \'terms-of-use\') @endphp">Terms of Use</a></li><li><a href="@php echo route(\'shop.cms.page\', \'contact-us\') @endphp">Contact Us</a></li></ul></div><div class="list-container"><span class="list-heading">Connect With Us</span><ul class="list-group"><li><a href="https://www.facebook.com/pokliwealthmanagement/"><span class="icon icon-facebook"></span>Facebook </a></li><li><a href="https://twitter.com/pokli77"><span class="icon icon-twitter"></span> Twitter </a></li><li><a href="https://www.instagram.com/pokliwealthmanagement/"><span class="icon icon-instagram"></span> Instagram </a></li><li><a href="http://www.pokli.com/"> <span class="icon icon-google-plus"></span>Blog </a></li></ul></div>',
                'name' => 'Pokli',
                'default_locale_id' => 1,
                'base_currency_id' => 1,
                'home_seo' => '{"meta_title": "Pokli", "meta_keywords": "pokli, wealth, gold", "meta_description": "pokli wealth management"}'
            ]);

        DB::table('channel_currencies')->insert([
                'channel_id' => 1,
                'currency_id' => 1,
            ]);

        DB::table('channel_locales')->insert([
                'channel_id' => 1,
                'locale_id' => 1,
            ]);

        DB::table('channel_inventory_sources')->insert([
                'channel_id' => 1,
                'inventory_source_id' => 1,
            ]);

        DB::table('core_config')->insert([
          'id' => 1,
          'code' => 'general.content.footer.footer_content',
          'value' => '© Pokli 2020 All Right Reserved',
          'channel_code' => 'default',
          'locale_code' => 'en',
        ]
        // [
        //   'id' => 2,
        //   'code' => 'customer.settings.email.verification',
        //   'value' => 1,
        // ],[
        //   'id' => 3,
        //   'code' => 'general.general.locale_options.weight_unit',
        //   'value' => 'kgs',
        //   'channel_code' => 'default',
        // ],[
        //   'id' => 4,
        //   'code' => 'general.content.footer.footer_toggle',
        //   'value' => 1,
        //   'channel_code' => 'default',
        //   'locale_code' => 'en',
        // ]
      );
    }
}
