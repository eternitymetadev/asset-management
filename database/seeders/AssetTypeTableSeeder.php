<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AssetType;

class AssetTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //sidebar option name
        $input = [
            [
                'name' => 'Laptop',
                'added_date' => '',
                'status' => 1,
                'created_at' => time()
            ],
            [
                'name' => 'Furniture',
                'added_date' => '',
                'status' => 1,
                'created_at' => time()
            ],
            
            

        ];
        foreach ($input as $val) {
            AssetType::firstOrCreate($val);
        }
    }
}
