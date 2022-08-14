<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Author extends Authenticatable
{
    use HasFactory;
    public function country(){

        return $this->belongsTo(Country::class);
    }

    public function user(){

        return $this->morphOne(User::class ,'actor' );
    }

    public function categories(){
        return $this->belongsToMany(Category::class ,'author_categories' ,
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

        static::deleting(function($author) { // before delete() method call this
             $author->articles()->delete();
             $author->user()->delete();
             $author->country()->delete();

             // do the rest of the cleanup...
        });}

}
