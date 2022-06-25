<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discount::truncate();
        $data = [
            [
                'name' => 'Promo Kemerdekaan',
                'price_min_discount' => '40000',
                'discount_in_percent' => '30',
                'max_discount' => '30000'
            ]
        ];

        Discount::insert($data);
    }
}
