<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// SoftDeletes use this for del
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // use HasFactory;
       use SoftDeletes;
           protected $fillable = [
        'user_id',
        'category_name',
 
    ];
public function get_name(){
	return $this->HasOne(User::class,'id','user_id');
}
}
