<?php
namespace App\Services;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryCreator{
    
    public function createCategory(string $name) : Category{
        
        DB::beginTransaction();
        $category = Category::create([
        'name' => $name
        ]);
        
        DB::commit();
            
        return $category;
    }
    
}