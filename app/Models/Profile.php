<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;



    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id','id');
    }
    public function author(){
        return $this->belongsTo(Author::class,'author_id','id');
    }
}
