<?php

namespace Database\Seeders;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();

        $data = [
            [
                'name' => 'shipping_price',
                'value' => '5000',
                'created_at' => Carbon::now()
            ]
        ];

        Setting::insert($data);
    }
}
