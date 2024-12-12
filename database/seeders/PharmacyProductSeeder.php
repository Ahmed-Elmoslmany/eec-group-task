<?php

namespace Database\Seeders;

use App\Models\Pharmacy;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PharmacyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory(200)->create(); 
        $pharmacies = Pharmacy::factory(500)->create(); 

        foreach ($products as $product) {
            $randomPharmacies = $pharmacies->random(rand(1, 5));

            foreach ($randomPharmacies as $pharmacy) {
                $product->pharmacies()->attach($pharmacy->id);
            }
        }
    }
}
