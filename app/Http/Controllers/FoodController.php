<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function index(){
        //$foods = Food::all();
        $foods = Food::with('category')->latest()->paginate(4);
        $categories = Category::with('foods')->get();
    
        return view('food.index', compact('foods', 'categories'));
    }
    // return view('food.index',['foods'=>Food::latest()->paginate(4)]);


    public function create(){
        $categories = Category::all();
        return view('food.create',['categories'=>$categories]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'food_name'=>'required',
            'price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'category_id'=>'nullable',
            'description'=>'nullable',
            'image_link'=>'required|url'
        ]);
        
        $newfood = Food::create($data);
        return redirect(route('food.index'));
    }
    
    public function edit(Food $food){ 
        // $food = Food::findOrFail($food->id);
        $categories = Category::all();
        return view('food.edit',['food'=>$food],['categories'=>$categories]);

        // dd($food); 

    }
    
    public function update(Food $food,Request $request){ 
        $data = $request->validate([
            'food_name'=>'required',
            'price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'category_id'=>'nullable',
            'description'=>'nullable',
            'image_link'=>'required|url'
        ]);
        $food->update($data);
        return redirect(route('food.index'))->with('success','Food update successfully'); 
        // dd($food); 

    }

    public function destory(Food $food){ 
        $food->delete();
        return redirect(route('food.index'))->with('success','Food Delete successfully');
    }


}
