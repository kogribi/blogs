<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Http\Controllers\CommentController;
use App\Models\Comment;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view("blogs.index", compact("blogs"));
    }
    public function show(Blog $blog) {
        $comments = Comment::all();
        return view("blogs.show", compact("blog","comments"));
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
            "category_id" => ["nullable", "exists:categories,id"]
          ]);
        Blog::create([
            "title" => $validated["title"],
            "content" => $validated["content"],
            "category_id" => $validated["category_id"] ?? null,
            
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
