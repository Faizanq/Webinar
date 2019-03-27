<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         DB::table('settings')->insert([
            'name' => 'address',
            'key' => 'address',
            'value' => Str::random(10),
        ]);

        DB::table('settings')->insert([
            'name' => 'contact number',
            'key' => 'contact_number',
            'value' => '+12548751145',
        ]);

        DB::table('settings')->insert([
            'name' => 'email',
            'key' => 'email_id',
            'value' => Str::random(10).'@gmail.com',
        ]);
    }
}
