<?php

namespace Database\Seeders;

use App\Models\Pharmacy;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PharmacyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory(5000)->create();
        $pharmacies = Pharmacy::factory(2000)->create();

        $pivotData = []; 
        
        foreach ($products as $product) {
            $randomPharmacies = $pharmacies->random(rand(1, 20));
            
            foreach ($randomPharmacies as $pharmacy) {
                $pivotData[] = [
                    'product_id' => $product->id,
                    'pharmacy_id' => $pharmacy->id,
                    'price' => rand(10, 100),
                ];
            }
        }
        
        DB::table('pharmacy_product')->insert($pivotData);
        
    }
}
