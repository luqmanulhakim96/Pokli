<?php

namespace Webkul\User\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->delete();

        DB::table('admins')->insert([
                'id' => 1,
                'name' => 'Pokli',
                'email' => 'admin@pokli.com',
                'password' => bcrypt('visionhomes1'),
                'status' => 1,
                'role_id' => 1,
            ]);
    }
}
