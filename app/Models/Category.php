<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function authors(){
        return $this->belongsToMany(Author::class ,'author_categories' ,
         'author_id' ,
         'category_id' ,
         'id',
         'id');
    }

    public function articles(){
        return $this->hasMany(Article::class);
     }

     public static function boot() {
        parent::boot();

        static::deleting(function($category) { // before delete() method call this
             $category->articles()->delete();
            //  $category->authors()->delete();
             // do the rest of the cleanup...
        });
    }
}
