<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Food;

class Category extends Model
{
    protected $fillable = [

        'id',
        'category_name',
    ];
    public function foods(){
        return $this->hasMany(Food::class, 'category_id','id');
    }
}
