<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view("blogs.index", compact("blogs"));
    }
    public function show(Blog $blog) {
        return view("blogs.show", compact("blog"));
    }
    public function create(){
        $categories = Category::all();
        $blogs = Blog::all();
        return view("blogs.create", compact("blogs", "categories"));
    }
    public function store(Request $request){
        $validated = $request->validate([
            "title" => ["required", "max:50"],
            "content" => ["required", "max:255"],
            "category_id" => ["required"]
          ]);
        Blog::create([
            "title" => $validated["title"],
            "content" => $validated["content"],
            "category_id" => $validated["category_id"],
            
          ]);
            return redirect("/blog");
    }
    public function edit(Blog $blog){
        $categories = Category::all();
        return view("blogs.edit", compact("blog", "categories"));
    }
    public function update(Request $request, Blog $blog){
        $validated = $request->validate([
            "title" => ["required", "max:50"],
            "content" => ["required", "max:255"],
            "category_id" => ["required"]
          ]); 
          $blog->title = $validated["title"];
          $blog->content = $validated["content"];
          $blog->category_id = $validated["category_id"];
          $blog->save();
          return redirect("/blog/$blog->id");
    }
    public function destroy(Blog $blog){
        $blog->delete();
        return redirect("/blog");
    }
}
