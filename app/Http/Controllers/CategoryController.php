<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view("category.index", compact("categories"));
    }
    public function show(Category $category) {
        return view("category.show", compact("category"));
    }
    public function create(){
        $categories = Category::all();
        return view("category.create", compact("categories"));
    }
    public function store(Request $request){
        $validated = $request->validate([
            "category_name" => ["required", "max:50"],
           
          ]);
        Category::create([
            "category_name" => $validated["category_name"],
            
          ]);
            return redirect("/categories");
    }
    public function edit(Category $category){
        return view("category.edit", compact("category"));
    }
    public function update(Request $request, Category $category){
        $validated = $request->validate([
            "category_name" => ["required", "max:50"],

          ]); 
          $category->category_name = $validated["category_name"];
          $category->save();
          return redirect("/categories/$category->id");
    }
    public function destroy(Category $category){
        $category->delete();
        return redirect("/categories");
    }
}

