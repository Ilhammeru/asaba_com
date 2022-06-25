<?php

namespace Database\Seeders;

use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::truncate();

        $data = [
            ['name' => 'Yanuar', 'created_at' => Carbon::now()],
            ['name' => 'Fatich', 'created_at' => Carbon::now()],
            ['name' => 'Habib', 'created_at' => Carbon::now()],
            ['name' => 'Zidan', 'created_at' => Carbon::now()],
        ];

        Users::insert($data);
    }
}
