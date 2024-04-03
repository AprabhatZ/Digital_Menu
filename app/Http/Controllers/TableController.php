<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
class TableController extends Controller
{
    public function index(){
        //$foods = Food::all();
        return view('table.index', ['tables'=>Table::latest()->paginate(10)]);
    }
    // return view('food.index',['foods'=>Food::latest()->paginate(4)]);


    public function create(){
        return view('table.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'table_name'=>'required'
        ]);
        
        $newtable = Table::create($data);
        return redirect(route('table.index'));
    }
    
    public function edit(Table $table){ 
        // $table = Food::findOrFail($food->id);
        return view('table.edit',['table'=>$table]);

        // dd($food); 

    }
    
    public function update(Table $table,Request $request){ 
        $data = $request->validate([
            'table_name'=>'required'
        ]);
        $table->update($data);
        return redirect(route('table.index'))->with('success','Table update successfully'); 
        // dd($food); 

    }

    public function destory(Table $table){ 
        $table->delete();
        return redirect(route('table.index'))->with('success','Table deleted successfully')->with('failed','');
    }


}
