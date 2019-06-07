<?php

namespace App\Http\Controllers;
use App\Category;
use App\Services\CategoryCreator;
use App\Http\Requests\CategoriesFormRequest;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
 public function index(Request $request){
        $categories = Category::query()->orderBy('name', 'asc')->paginate(5);
        $message = $request->session()->get('succesful');
        
        return view('categories.index', compact('categories', 'message'));
    }
    
    public function create(){
        return view('categories.create');
    }
    
    public function store(CategoriesFormRequest $request, CategoryCreator $creator){
        
        $category = $creator->createCategory($request->name);
    
        $request->session()
            ->flash(
            'succesful', 
            "Category: ".$category->name." was succesfuly added!"
        );
        return redirect()->route('categories_list');
    }
    
    public function destroy(Request $request){
        
        Category::destroy($request->id);
        $request->session()
            ->flash(
            'succesful', 
            "Category was succesfuly removed!"
        );
        return redirect()->route('categories_list');
    }
    
    public function edit(int $id, Request $request){
        $newName = $request->name;
        $category = Category::find($id);
        $category->name = $newName;
        $category->save();
    }
}
