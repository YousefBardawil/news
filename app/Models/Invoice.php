<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class,'invoice_id','id');
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($invoice) {
             $invoice->products()->delete();
        });}
}

