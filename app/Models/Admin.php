<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;
    public function country(){

        return $this->belongsTo(Country::class);
    }

    public function user(){

        return $this->morphOne(User::class ,'actor','actor_type','actor_id','id');
    }


    public static function boot() {
        parent::boot();

        static::deleting(function($admin) { // before delete() method call this
             $admin->user()->delete();
             $admin->country()->delete();
             // do the rest of the cleanup...
        });}


}
