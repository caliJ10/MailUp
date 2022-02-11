<?php

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
        DB::table('products')->insert([
            [
                "name"=> "MacBook Pro 13.3'' Retina [MYD82] M1 Chip 256 GB - Space Gray",
                "description"=> null,
                "image"=> "apple.com/v/macbook-pro/ac/images/overview/hero_13__d1tfa5zby7e6_large_2x.jpg",
                "brand"=> "Apple",
                "price"=> "2000.00",
                "price_sale"=> "1950.00",
                "category"=> "Macbook Pro",
                "stock"=> 5
            ],
            [
                "name"=> "MacBook Pro 15.3'' Retina [MYD82] M1 Chip 256 GB - Space Gray",
                "description"=> null,
                "image"=> "apple.com/v/macbook-pro/ac/images/overview/hero_15__d1tfa5zby7e6_large_2x.jpg",
                "brand"=> "Apple",
                "price"=> "2200.00",
                "price_sale"=> "2150.00",
                "category"=> "Macbook Pro",
                "stock"=> 5
            ],
            [
                "name"=> "MacBook Pro 17.3'' Retina [MYD82] M1 Chip 256 GB - Space Gray",
                "description"=> null,
                "image"=> "apple.com/v/macbook-pro/ac/images/overview/hero_17__d1tfa5zby7e6_large_2x.jpg",
                "brand"=> "Apple",
                "price"=> "2500.00",
                "price_sale"=> "2450.00",
                "category"=> "Macbook Pro",
                "stock"=> 5
            ],
            [
                "name"=> "Samsung Galaxy S22",
                "description"=> null,
                "image"=> "samsung.com/v/macbook-pro/ac/images/overview/hero_17__d1tfa5zby7e6_large_2x.jpg",
                "brand"=> "Samsung",
                "price"=> "2500.00",
                "price_sale"=> "2450.00",
                "category"=> "Smartphone",
                "stock"=> 5
            ]
        ]);
    }
}
