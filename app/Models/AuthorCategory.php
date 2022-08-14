<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorCategory extends Model
{
    use HasFactory;

    public function author_categories(){
        return $this->hasMany(Author::class,Category::class ,'author_categories');
    }
}
