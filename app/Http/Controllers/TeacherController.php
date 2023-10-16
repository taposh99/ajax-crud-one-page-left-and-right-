<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        return view('teacher.index');
        
    }
    public function store(Request $request) {
      
        $product = new Teacher();
        $product->name = $request->input('name');
        $product->title = $request->input('title');
        $product->institute = $request->input('institute');
        $product->save();
    
    
        // You can return a response to the AJAX request
        return response()->json(['message' => 'Product saved successfully']);
    }

}
