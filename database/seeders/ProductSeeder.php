<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $data = [
            [
                'name' => 'Mie Ayam',
                'price' => '15000',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Ayam Geprek',
                'price' => '17000',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Es Teh',
                'price' => '4000',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Es Jeruk',
                'price' => '5000',
                'created_at' => Carbon::now()
            ],
        ];

        Product::insert($data);
    }
}
