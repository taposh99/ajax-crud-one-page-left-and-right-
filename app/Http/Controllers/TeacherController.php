<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $data = Teacher::latest()->get();

        return view('teacher.index', [
            'data' => $data,
        ]);
    }

 //store code

    public function store(Request $request)
    {

        $product = new Teacher();
        $product->name = $request->input('name');
        $product->title = $request->input('title');
        $product->institute = $request->input('institute');
        $product->save();


        // You can return a response to the AJAX request
        return response()->json(['message' => 'Product saved successfully']);
    }
    //edit controller code
    
    public function editData($id)
    {
       
        $data = Teacher::findOrFail($id);
        return response()->json($data);
    }

    //update ajax code
    
    public function updateData(Request $request, $id)
    {

        $data = Teacher::findOrFail($id)->update([
            'name' => $request->name,
            'title' => $request->title,
            'institute' => $request->institute,
        ]);
      


        // You can return a response to the AJAX request
        return response()->json($data);
    }
}

