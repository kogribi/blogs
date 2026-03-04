<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::all();
    }
    public function create(){
        $comments = Comment::all();
    }
    public function store(Request $request){
        $validated = $request->validate([
            "Create_autors" => ["required", "max:50"],
            "Create_content" => ["required", "max:100"],
            "Create_post_id" => ["required"]
           
          ]);
        Comment::create([
            "autors" => $validated["Create_autors"],
            "content" => $validated["Create_content"],
            "post_id" => $validated["Create_post_id"]
          ]);
            return redirect("/blog/" . $validated["Create_post_id"]);
    }
    public function edit(Comment $comment){
        $blog = $comment->blog;
        $Allcomments = Comment::all();
        return view("comment.edit", compact("comment","Allcomments", "blog"));
    }
    public function update(Request $request, Comment $comment){
        $validated = $request->validate([
            "autors" => ["required", "max:50"],
            "content" => ["required", "max:100"],
            "post_id" => ["required"]

          ]); 
          $comment->autors = $validated["autors"];
          $comment->content = $validated["content"];
          $comment->post_id = $validated["post_id"];
          $comment->save();
          return redirect("/blog/$comment->post_id");
    }
    public function destroy(Comment $comment){
        $comment->delete();
        return redirect("/blog/" . $comment["post_id"]);
    }
}
