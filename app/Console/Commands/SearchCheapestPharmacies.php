<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Console\Command;

class SearchCheapestPharmacies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:search-cheapest-pharmacies {productId : The product id to search} {pharmacies=5 : The number of pharmacies}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get 5 cheapest pharmacies that have the product by product id';

    /**
     * Execute the console command.
     */

    public function __construct(public ProductService $productService){
        parent::__construct();
    }
    public function handle()
    {
        $productId = $this->argument('productId');
        $numOfPharmacies = $this->argument('pharmacies');

        $cheapestPharmacies = $this->productService->getCheapestPharmacies($productId, $numOfPharmacies);

        if (!$cheapestPharmacies) {
            $this->error('Product not found');
            return 1;
        }

        $this->info(json_encode($cheapestPharmacies, JSON_PRETTY_PRINT));

        return 0;
    }
}
