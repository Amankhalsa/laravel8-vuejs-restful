<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use this and method softDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    // use HasFactory;
       use SoftDeletes;


            protected $fillable = [
        'title',
        'discription',
        'image',

 
    ];
}
