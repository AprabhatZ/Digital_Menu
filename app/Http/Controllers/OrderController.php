<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Category;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDetails;

class OrderController extends Controller
{
    public function index(){
       
        // Retrieve all orders ordered by the latest one
    $orders = Order::where('order_status',0)->latest()->get();
    
    // Retrieve all order details
    $orderDetails = OrderDetails::with('food')->get();
    
    // Pass both orders and order details to the view
    return view('order.index', [
        'orders' => $orders,
        'orderDetails' => $orderDetails
    ]);
    }

    public function scan(Table $table){

        $foods = Food::with('category')->latest()->get();
        $categories = Category::with('foods')->get();
        return view('order.scan',compact('foods', 'categories'),['table'=>$table]);
    }
    // public function order(Request $request){

    //     $foods = Food::with('category')->latest()->get();
    //     $categories = Category::with('foods')->get();
    // }

    public function cart(Request $request,Table $table){

        $datas=json_decode($request->order_data,true);
        // return $datas["6"]['price'];
        $order=Order::create([
            'table_id'=>$table->id
        ]);
        $total_amount=0;
        $total_quantity=0;
        if($order){
            foreach($datas as $food_id=>$data){

                $total_amount+=$data['quantity']*$data['price'];
                $total_quantity+=$data['quantity'];
                OrderDetails::create([
                    'order_id'=>$order->id,
                    'food_id'=>$food_id,
                    'quantity'=>$data['quantity'],
                    'food_price'=>$data['price']
                ]);
            }
            $order->total_amount=$total_amount;
            $order->total_quantity=$total_quantity;
            $order->save();
        }
        return 'success';  
        return $datas;
        return $table;
        return view('order.cart',['table'=>$table]);
    }

    public function receiveOrder(Request $request)
    {
        return $request;
    }

}


 // $orders = DB::table('orders')
        // ->leftJoin('order_details', 'orders.id', '=', 'order_details.order_id')
        // ->select('orders.*', 'order_details.*')
        // // ->latest('id')
        // ->get();