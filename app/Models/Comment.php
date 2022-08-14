<?php

namespace App\Models;

use App\Models\Comment as ModelsComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function post(){
        return $this->belongsTo(Post::class,'post_id');
    }
}
