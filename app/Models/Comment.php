<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ["autors", "content", "post_id"];
    public function blog()
{
    return $this->belongsTo(Blog::class, 'post_id');
}
}
