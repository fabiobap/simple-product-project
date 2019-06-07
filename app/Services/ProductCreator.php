<?php
namespace App\Services;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductCreator{
    
    public function createProduct(string $name, float $price, string $description, int $category_id) : Product{
        
        DB::beginTransaction();
        $product = Product::create([
        'name' => $name,
        'price' => $price,
        'description' => $description,
        'category_id' => $category_id,
        ]);
        
        DB::commit();
            
        return $product;
    }
    
}