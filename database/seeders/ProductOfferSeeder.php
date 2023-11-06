<?php

namespace Database\Seeders;

use App\Models\ProductOffer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductOffer::insert([
            [
                'product_id' => 1,
                'offer_id'   => 1,
            ],
            [
                'product_id' => 1,
                'offer_id'   => 2,
            ],
            [
                'product_id' => 2,
                'offer_id'   => 3,
            ],
            [
                'product_id' => 3,
                'offer_id'   => 4,
            ]
        ]);
    }
}
