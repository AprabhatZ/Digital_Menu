<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetails;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [

        'table_id',
       'order_status',
       'total_amount', 
       'total_quantity'
    ];
    public function orderDetails(){
        return $this->hasMany(OrderDetails::class, 'order_id','id');
    }
    public function table(){
        return $this->belongsTo(Table::class, 'table_id','id');
    }
}
