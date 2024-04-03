<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Food extends Model
{
    use HasFactory;
    protected $fillable = [

                            'food_name',
                           'category_id',
                           'price', 
                           'image_link',
                           'description'
                        ];

    public function category(){

    return $this->belongsTo(Category::class);
        
    }
}