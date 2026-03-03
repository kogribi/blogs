<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
            "autors" => ["required", "max:50"],
            "content" => ["required", "max:100"],
            "post_id" => ["required"]
           
          ]);
        Comment::create([
            "autors" => $validated["autors"],
            "content" => $validated["content"],
            "post_id" => $validated["post_id"]
          ]);
            return redirect("/blog/" . $validated["post_id"]);
    }
    public function edit(Comment $comment){
        return view("comment.edit", compact("comment"));
    }
    public function update(Request $request, Comment $comment){
        $validated = $request->validate([
            "autors" => ["required", "max:50"],
            "content" => ["required", "max:100"],
            "post_id" => ["required"]

          ]); 
          $comment->autors = $validated["autors"];
          $comment->autors = $validated["content"];
          $comment->autors = $validated["post_id"];
          $comment->save();
          return redirect("/blog/$comment->post_id");
    }
    public function destroy(Comment $comment){
        $comment->delete();
        return redirect("/blog/" . $comment["post_id"]);
    }
}
