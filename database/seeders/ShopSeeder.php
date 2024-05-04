<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Hash;


class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => '太郎', # varchar
                'password' => Hash::make('xxx'), # varchar
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('shops')->insert([
                'maker_id' => '1', # bigint
                'name' => 'スーパー', # varchar
                'image_url' => 'xxx', # varchar
                'address' => '東京都', # varchar
                'tel' => '012-345-6789', # varchar
                'open' => '09:00:00', # time
                'close' => '21:00:00', # time
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('shops')->insert([
                'maker_id' => '1', # bigint
                'name' => 'スーパー2', # varchar
                'image_url' => 'xxx2', # varchar
                'address' => '東京都2', # varchar
                'tel' => '912-345-6789', # varchar
                'open' => '09:00:00', # time
                'close' => '21:00:00', # time
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
