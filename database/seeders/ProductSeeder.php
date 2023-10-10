<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products=[[
            'name' => 'Laptop',
            'description' => 'High speed Gaming Machine with 1 TB RAM',
            'price' => 45000.00,
            'created_at'=>Carbon::now()
        ],
        [
            'name' => 'LED Tv',
            'description' => 'Specialised edition of OMLED featured Android Tv.Gaming Options',
            'price' => 25000.00,
            'created_at'=>Carbon::now()
        ],
        [
            'name' => 'Accounting Software',
            'description' => 'Desktop application developed using Electron its Sass application',
            'price' => 5000.00,
            'created_at'=>Carbon::now()
        ]
        ];
    DB::table('products')->insert($products);
    }
}
