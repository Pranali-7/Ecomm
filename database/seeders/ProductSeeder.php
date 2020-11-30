<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'=>'LG Fridge',
                'price'=>'250',
                'category'=>'Fridge',
                'description'=>'A smart phone with 4GB Ram and Much More Features',
                'gallery'=> 'https://unsplash.com/s/photos/mobile-phone'
            ],

            [
                'name'=>'Sony Tv',
                'price'=>'500',
                'category'=>'TV',
                'description'=>'A smart phone with 4GB Ram and Much More Features',
                'gallery'=> 'https://unsplash.com/s/photos/mobile-phone'
            ],
            [
                'name'=>'Onida Tv',
                'price'=>'275',
                'category'=>'Tv',
                'description'=>'A smart phone with 4GB Ram and Much More Features',
                'gallery'=> 'https://unsplash.com/s/photos/mobile-phone'
            ],
            
        ]);

    }
}
