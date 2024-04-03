<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Food;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable = [

        'order_id',
       'food_id',
       'quantity', 
       'food_price'
    ];
    public function order(){

        return $this->belongsTo(Order::class);

        }
        public function food(){

            return $this->belongsTo(Food::class,'food_id','id');
               
            }
}
