<?php

namespace App\Http\Controllers;

use App\{Category, Product};
use App\Services\ProductCreator;
use App\Http\Requests\ProductsFormRequest;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
   public function index(Request $request){
        $products = Product::query()->orderBy('name', 'asc')->paginate(5);
        $message = $request->session()->get('succesful');
        
        return view('products.index', compact('products', 'message'));
    }
    
    public function create(){
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }
    
    public function store(ProductsFormRequest $request, ProductCreator $creator){
        
        $product = $creator->createProduct($request->name, $request->price, $request->description, $request->category_id);
    
        $request->session()
            ->flash(
            'succesful', 
            "Product: ".$product->name." was succesfuly added!"
        );
        return redirect()->route('products_list');
    }
    
    public function edit(int $id, Request $request){
        $product = Product::find($id);

        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }
    
    public function update(int $id, Request $request){
        
        $newName = $request->name;
        $newPrice = $request->price;
        $newDescription = $request->description;
        $newCategory = $request->category_id;
        
        $product = Product::find($id);
        
        $product->name = $newName;
        $product->price = $newPrice;
        $product->description = $newDescription;
        $product->category_id = $newCategory;
        
        $product->save();
        
        $request->session()
            ->flash(
            'succesful', 
            "Product was succesfuly edited!"
        );
        return redirect()->route('products_list');
    }
    public function destroy(Request $request){
        
        Product::destroy($request->id);
        $request->session()
            ->flash(
            'succesful', 
            "Product was succesfuly removed!"
        );
        return redirect()->route('products_list');
    }
}
