<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public function cities(){
        return $this->hasMany(City::class ,'country_id','id');
     }

     public function admins(){
         return $this->hasMany(Admin::class );
     }
     public function authors(){
        return $this->hasMany(Author::class );
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($country) { // before delete() method call this
             $country->cities()->delete();
            //  $category->authors()->delete();
             // do the rest of the cleanup...
        });
    }
}
