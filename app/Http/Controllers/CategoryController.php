<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        //$foods = Food::all();
        return view('category.index', ['categories'=>Category::latest()->paginate(10)]);
    }
    // return view('food.index',['foods'=>Food::latest()->paginate(4)]);


    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'category_name'=>'required'
        ]);
        
        $newCategory = Category::create($data);
        return redirect(route('category.index'));
    }
    
    public function edit(Category $category){ 
        // $table = Food::findOrFail($food->id);
        return view('category.edit',['category'=>$category]);

        // dd($food); 

    }
    
    public function update(Category $category,Request $request){ 
        $data = $request->validate([
            'category_name'=>'required'
        ]);
        $category->update($data);
        return redirect(route('table.index'))->with('success','Category update successfully'); 
        // dd($food); 

    }

    public function destory(Category $category){ 
        $category->delete();
        return redirect(route('category.index'))->with('success','Category deleted successfully')->with('failed','');
    }


}
